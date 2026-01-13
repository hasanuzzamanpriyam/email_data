<?php
require_once 'assets/php/header.php';
require_once dirname(__DIR__) . '/assets/php/config.php';

$database = new Database();
$pdo = $database->conn;

if (isset($_POST['insertEmail'])) {
    $title = $_POST['title'];
    $category = $_POST['category'];
    $totalemail = $_POST['total_email'];
    $shortdec = $_POST['short_description'];
    $desc = $_POST['editor1'];
    $price = $_POST['price'];

    $seoTitle = $_POST['seoTitle'];
    $seoUrl = preg_replace('/\s+/', '-', strtolower($_POST['seoUrl']));
    $seoKey = $_POST['seoKeyword'];
    $seoDes = $_POST['seoDescription'];

    try {
        $stmt = $pdo->prepare("INSERT INTO `email_short_info`(`title`, `category`, `total_email`, `short_description`, `description`, `price`, `seo_title`, `seo_url`, `seo_keyword`, `seo_desc`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$title, $category, $totalemail, $shortdec, $desc, $price, $seoTitle, $seoUrl, $seoKey, $seoDes])) {
            echo "<script>alert('Email added successfully!')</script>";
            echo "<meta http-equiv='refresh' content='0'>";
        }
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }
}
if (isset($_POST['updateEmail'])) {
    $updateId = $_POST['updatePostId'];
    $title = $_POST['updateTitle'];
    $category = $_POST['updateCategory'];
    $totalemail = $_POST['update-total_email'];
    $shortdec = $_POST['update_short_description'];
    $desc = $_POST['updateEditor1'];
    $price = $_POST['updatePprice'];

    $seoTitle = $_POST['seoUpdateTitle'];
    $seoUrl = preg_replace('/\s+/', '-', strtolower($_POST['seoUpdateUrl']));
    $seoKey = $_POST['seoUpdateKeyword'];
    $seoDes = $_POST['seoUpdateDescription'];

    $stmt = $pdo->prepare("UPDATE `email_short_info` SET `title`=?,`category`=?,`total_email`=?,`short_description`=?,`description`=?,`price`=?, `seo_title`=?, `seo_url`=?, `seo_keyword`=?, `seo_desc`=? WHERE id=?");

    if ($stmt->execute([$title, $category, $totalemail, $shortdec, $desc, $price, $seoTitle, $seoUrl, $seoKey, $seoDes, $updateId])) {
        echo "<script>alert('Data Updated successfully')</script>";
        echo "<meta http-equiv='refresh' content='0'>";
    } else {
        echo "Error: " . implode(", ", $stmt->errorInfo());
    }
}

?>
<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
<main>
    <div class="seo-details">
        <h3>Insert New Email For Ready Made list</h3>
        <form id="insert-email-form" method="POST" action="#">
            <div class="form-floating mb-3">
                <select class="form-select" id="floatingSelect" name="title" aria-label="Select E-mail Category">
                    <option selected disabled>-Select Options-</option>
                    <option>Healthcare Professional</option>
                    <option>Industries</option>
                    <option>International</option>
                    <option>Job Level</option>
                    <option>Job Title</option>
                    <option>Job Function</option>
                    <option>Office 365</option>
                    <option>Real Estate</option>
                    <option>Zoom Info</option>
                </select>
                <label for="floatingSelect">Select E-mail Category</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" name="category" required placeholder="Enter E-mail Category">
                <label for="floatingInput">Category</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="total-email" placeholder="Enter Page Title" name="total_email" onkeyup="myFunction()" required>
                <label for="total-email">Total E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Short Description" name="short_description" required style="height: 100px"></textarea>
                <label for="floatingTextarea2">Short Description</label>
            </div>
            <div class="form-floating mb-3">
                <ul id="fieldList" style="list-style: none; margin-left: -33px;">
                    <li>
                        <textarea class='form-control fixborder' id="editor1" name="editor1" placeholder='File description'></textarea>
                    </li>
                </ul>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="total-price" name="price" value="0" readonly>
                <label for="total-price">Total Price</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="seoTitle" placeholder="Enter SEO Title" name="seoTitle" required>
                <label for="seoTitle">SEO Title</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="seoUrl" placeholder="Enter SEO URL" name="seoUrl" required>
                <label for="seoUrl">SEO URL</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Write Key-word" id="seoKeyword" style="height: 100px" name="seoKeyword" required></textarea>
                <label for="seoKeyword">Key-word</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Write short description" id="seoDescription" style="height: 100px" name="seoDescription" required></textarea>
                <label for="seoDescription">Description</label>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-3">
                    <input type="submit" class="btn btn-primary btn-block" id="insert-email-btn" value="Insert E-mail" name="insertEmail">
                </div>
            </div>
        </form>
    </div>
    <div class="seo-update-details" style="display: none;">
        <h3>Edit Email Details For Ready Made list</h3>
        <form id="update-email-form" method="POST" action="#">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="updateTitle" name="updateTitle" required placeholder="Enter E-mail Category">
                <label for="updateTitle">Category</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="updateCategory" name="updateCategory" required placeholder="Enter E-mail Category">
                <label for="updateCategory">Category</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="update-total-email" placeholder="Enter Page Title" name="update-total_email" onkeyup="myFunctionU()" required>
                <label for="total-email">Total E-mail</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Short Description" name="update_short_description" required style="height: 100px" id="update_short_description"></textarea>
                <label for="update_short_description">Short Description</label>
            </div>
            <div class="form-floating mb-3">
                <ul id="fieldList" style="list-style: none; margin-left: -33px;">
                    <li>
                        <textarea class='form-control fixborder' id="updateEditor1" name="updateEditor1" placeholder='File description'></textarea>
                    </li>
                </ul>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="update-total-price" name="updatePprice" value="0" readonly>
                <label for="total-price">Total Price</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="seoUpdateTitle" placeholder="Enter SEO Title" name="seoUpdateTitle">
                <label for="seoUpdateTitle">SEO Title</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="seoUpdateUrl" placeholder="Enter SEO URL" name="seoUpdateUrl">
                <label for="seoUpdateUrl">SEO URL</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Write Key-word" id="seoUpdateKeyword" style="height: 100px" name="seoUpdateKeyword"></textarea>
                <label for="seoUpdateKeyword">Key-word</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" placeholder="Write short description" id="seoUpdateDescription" style="height: 100px" name="seoUpdateDescription"></textarea>
                <label for="seoUpdateDescription">Description</label>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-3">
                    <input type="hidden" name="updatePostId" id="updatePostId">
                    <input type="submit" class="btn btn-primary btn-block" id="update-email-btn" value="Update Email" name="updateEmail">
                </div>
            </div>
        </form>
    </div>
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card">
                <h3>All E-mail list</h3>
                <div class="table-responsive p-3" id="showEmailsTable">
                    <h3 class="text-center font-weight-bold">Please Wait....</h3>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
require_once 'assets/php/footer.php';
?>
<script>
    $(document).ready(function() {
        $("body").on("click", ".editEmailBtn", function(e) {
            e.preventDefault();

            editEmailId = $(this).attr("id");

            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    editEmailId: editEmailId
                },
                success: function(response) {
                    $(".seo-update-details").attr('style', 'display:block');
                    $(".seo-details").attr('style', 'display:none');
                    $("#updateTitle").attr('disabled', true);

                    data = JSON.parse(response);
                    $("#updateTitle").val(data.title);
                    $("#updateCategory").val(data.category);
                    $("#update-total-email").val(data.total_email);
                    $("#update_short_description").val(data.short_description);
                    CKEDITOR.instances['updateEditor1'].setData(data.description)
                    $("#update-total-price").val(data.price);
                    $("#updatePostId").val(data.id);
                    $("#seoUpdateTitle").val(data.seo_title);
                    $("#seoUpdateUrl").val(data.seo_url);
                    $("#seoUpdateKeyword").val(data.seo_keyword);
                    $("#seoUpdateDescription").val(data.seo_desc);
                }
            });
        });
        $("body").on("click", ".deleteEmailBtn", function(e) {
            e.preventDefault();

            let deleteEmailBtn = $(this).attr("id");

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: 'assets/php/process',
                        type: 'post',
                        data: {
                            deleteEmailBtn: deleteEmailBtn
                        },
                        success: function(response) {
                            Swal.fire(
                                'Deleted!',
                                'Your file has been deleted.',
                                'success'
                            )
                            location.reload();
                        }
                    });
                }
            })
        });

        displayAllEmail();

        function displayAllEmail() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: {
                    action: 'display-emails'
                },
                success: function(response) {
                    $("#showEmailsTable").html(response);
                    $("table").DataTable();
                }
            });
        }
    });
</script>
<script type="text/javascript">
    function myFunction() {
        let totalEmail = document.getElementById("total-email").value;
        let price = 0;
        if (totalEmail < 6000) {
            price = (totalEmail * 0.10);
        } else if (totalEmail < 11000) {
            price = (totalEmail * 0.09);
        } else if (totalEmail < 26000) {
            price = (totalEmail * 0.088);
        } else if (totalEmail < 51000) {
            price = (totalEmail * 0.08);
        } else if (totalEmail < 76000) {
            price = (totalEmail * 0.073);
        } else if (totalEmail < 110000) {
            price = (totalEmail * 0.07);
        } else if (totalEmail < 510000) {
            price = (totalEmail * 0.06);
        } else if (totalEmail < 1000000) {
            price = (totalEmail * 0.05);
        } else {
            price = (totalEmail * 0.05);
        }
        document.getElementById("total-price").value = Math.round(price).toFixed(2);
    }

    function myFunctionU() {
        let totalEmail = document.getElementById("update-total-email").value;
        let price = 0;
        if (totalEmail < 6000) {
            price = (totalEmail * 0.10);
        } else if (totalEmail < 11000) {
            price = (totalEmail * 0.09);
        } else if (totalEmail < 26000) {
            price = (totalEmail * 0.088);
        } else if (totalEmail < 51000) {
            price = (totalEmail * 0.08);
        } else if (totalEmail < 76000) {
            price = (totalEmail * 0.073);
        } else if (totalEmail < 110000) {
            price = (totalEmail * 0.07);
        } else if (totalEmail < 510000) {
            price = (totalEmail * 0.06);
        } else if (totalEmail < 1000000) {
            price = (totalEmail * 0.05);
        } else {
            price = (totalEmail * 0.05);
        }
        document.getElementById("update-total-price").value = Math.round(price).toFixed(2);
    }
</script>
<script>
    CKEDITOR.replace('editor1', {
        fullPage: true,
        extraPlugins: 'docprops',
        allowedContent: true
    });
    CKEDITOR.replace('updateEditor1', {
        fullPage: true,
        extraPlugins: 'docprops',
        allowedContent: true
    });

    function CKEditorChange(name) {

        CKEDITOR.replace(name, {
            toolbar: [{
                    name: 'document',
                    items: ['Print']
                },
                {
                    name: 'clipboard',
                    items: ['Undo', 'Redo']
                },
                {
                    name: 'styles',
                    items: ['Format', 'Font', 'FontSize']
                },
                {
                    name: 'basicstyles',
                    items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']
                },
                {
                    name: 'colors',
                    items: ['TextColor', 'BGColor']
                },
                {
                    name: 'align',
                    items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
                },
                {
                    name: 'links',
                    items: ['Link', 'Unlink']
                },
                {
                    name: 'paragraph',
                    items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
                },
                {
                    name: 'insert',
                    items: ['Image', 'Table']
                },
                {
                    name: 'tools',
                    items: ['Maximize']
                },
                {
                    name: 'editing',
                    items: ['Scayt']
                }
            ],
            filebrowserUploadUrl: 'request.php?pID=Upload',
            customConfig: '',
            disallowedContent: 'img{width,height,float}',
            extraAllowedContent: 'img[width,height,align]',
            extraPlugins: 'tableresize,uploadimage,uploadfile',
            height: 200,
            contentsCss: ['https://cdn.ckeditor.com/4.8.0/full-all/contents.css'],
            bodyClass: 'document-editor',
            format_tags: 'p;h1;h2;h3;pre',
            removeDialogTabs: 'image:advanced;link:advanced',
            stylesSet: [{
                    name: 'Marker',
                    element: 'span',
                    attributes: {
                        'class': 'marker'
                    }
                },
                {
                    name: 'Cited Work',
                    element: 'cite'
                },
                {
                    name: 'Inline Quotation',
                    element: 'q'
                },
                {
                    name: 'Special Container',
                    element: 'div',
                    styles: {
                        padding: '5px 10px',
                        background: '#eee',
                        border: '1px solid #ccc'
                    }
                },
                {
                    name: 'Compact table',
                    element: 'table',
                    attributes: {
                        cellpadding: '5',
                        cellspacing: '0',
                        border: '1',
                        bordercolor: '#ccc'
                    },
                    styles: {
                        'border-collapse': 'collapse'
                    }
                },
                {
                    name: 'Borderless Table',
                    element: 'table',
                    styles: {
                        'border-style': 'hidden',
                        'background-color': '#E6E6FA'
                    }
                },
                {
                    name: 'Square Bulleted List',
                    element: 'ul',
                    styles: {
                        'list-style-type': 'square'
                    }
                }
            ]
        });
    }
</script>
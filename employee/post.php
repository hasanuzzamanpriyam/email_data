<?php
require_once 'assets/php/header.php';

    $servername = "premium103.web-hosting.com";
    $username = "mailrqyk_mailerstation";
    $password = "mailrqyk_mailerstation";
    $dbname = "mailrqyk_mailerstation";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

if(isset($_POST['insertEmail'])){
    $title = $_POST['title'];
    $category = $_POST['category'];
    $totalemail = $_POST['total_email'];
    $shortdec = $_POST['short_description'];
    $desc = $_POST['editor1'];
    $price = $_POST['price'];

    $sql = "INSERT INTO `email_short_info`(`title`, `category`, `total_email`, `short_description`, `description`, `price`) VALUES ('$title','$category','$totalemail','$shortdec','$desc','$price')";

    mysqli_query($conn, $sql);

}
if(isset($_POST['updateEmail'])){
    $updateId = $_POST['updatePostId'];
    $category = $_POST['updateCategory'];
    $totalemail = $_POST['update-total_email'];
    $shortdec = $_POST['update_short_description'];
    $desc = $_POST['updateEditor1'];
    $price = $_POST['updatePprice'];

    $sql2 = "UPDATE `email_short_info` SET `category`='$category',`total_email`='$totalemail',`short_description`='$shortdec',`description`='$desc',`price`='$price' WHERE id= $updateId";

    mysqli_query($conn, $sql2);

}
    
?>
<script src="https://cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>
<main>
    <div class="seo-details">
        <h3>Insert New Email For Ready Made list</h3>
        <form id="insert-email-form"  method="POST" action="#">
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
                <input type="text" class="form-control" id="total-email" placeholder="Enter Page Title" name="total_email" onkeyup="myFunction(value.this)" required>
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
            <div class="row justify-content-end">
                <div class="col-lg-3">
                    <input type="submit" class="btn btn-primary btn-block" id="insert-email-btn" value="Insert E-mail" name="insertEmail">
                </div>
            </div>
        </form>
    </div>
    <div class="seo-update-details" style="display: none;">
        <h3>Edit Email Details For Ready Made list</h3>
        <form id="update-email-form"  method="POST" action="#">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="updateTitle" name="updateTitle" required placeholder="Enter E-mail Category">
                <label for="updateTitle">Category</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="updateCategory" name="updateCategory" required placeholder="Enter E-mail Category">
                <label for="updateCategory">Category</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="update-total-email" placeholder="Enter Page Title" name="update-total_email" onkeyup="myFunctionU(value.this)" required>
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
    $(document).ready(function () {
        $("body").on("click", ".editEmailBtn", function (e) {
            e.preventDefault();

            editEmailId =  $(this).attr("id");

            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: { editEmailId: editEmailId},
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
                }
            });  
        });
        $("body").on("click", ".deleteEmailBtn", function (e) {
            e.preventDefault();

          let deleteEmailBtn =  $(this).attr("id");

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
                    data: { deleteEmailBtn: deleteEmailBtn },
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
    function myFunction(){
        let totalEmail = document.getElementById("total-email").value;
        let price = 0;
        if (totalEmail <= 5000) {
            price = (totalEmail * 0.05);
        } else if (totalEmail <= 10000) {
            price = (totalEmail * 0.045);
        } else if (totalEmail <= 25000) {
            price = (totalEmail * 0.044);
        } else if (totalEmail <= 50000) {
            price = (totalEmail * 0.04);
        } else if (totalEmail <= 75000) {
            price = (totalEmail * 0.0365);
        } else if (totalEmail <= 100000) {
            price = (totalEmail * 0.035);
        } else if (totalEmail <= 500000) {
            price = (totalEmail * 0.03);
        } else {
            price = (totalEmail * 0.025);
        }
        document.getElementById("total-price").value = Math.round(price).toFixed(2);
    }
    function myFunctionU(){
        let totalEmail = document.getElementById("update-total-email").value;
        let price = 0;
        if (totalEmail <= 5000) {
            price = (totalEmail * 0.05);
        } else if (totalEmail <= 10000) {
            price = (totalEmail * 0.045);
        } else if (totalEmail <= 25000) {
            price = (totalEmail * 0.044);
        } else if (totalEmail <= 50000) {
            price = (totalEmail * 0.04);
        } else if (totalEmail <= 75000) {
            price = (totalEmail * 0.0365);
        } else if (totalEmail <= 100000) {
            price = (totalEmail * 0.035);
        } else if (totalEmail <= 500000) {
            price = (totalEmail * 0.03);
        } else {
            price = (totalEmail * 0.025);
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

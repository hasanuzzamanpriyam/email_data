<?php
require_once 'assets/php/header.php';
require_once 'assets/php/config.php';

$db = new Database();
$conn = $db->conn;

// Insert Blog (PDO)
if (isset($_POST['insertBlog'])) {
    $category = $_POST['page'];
    $title = $_POST['title'];
    $description = $_POST['editor1'];
    $seoTitle = $_POST['seoTitle'];
    $seoUrl = str_replace(' ', '-', $_POST['seoUrl']); // Replace spaces with -
    $seoKey = $_POST['seoKeyword'];
    $seoDesc = $_POST['seoDescription'];

    $stmt = $conn->prepare("INSERT INTO blogs (category, title, description, seo_title, seo_url, seo_key, seo_desc) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$category, $title, $description, $seoTitle, $seoUrl, $seoKey, $seoDesc]);

    echo "<script>window.location.href = '?status=inserted';</script>";
    exit();
}

// Update Blog (PDO)
if (isset($_POST['updateBlog'])) {
    $updateId = $_POST['updateBlogId'];
    $category = $_POST['updateBlogCategory'];
    $title = $_POST['updateBlogtitle'];
    $description = $_POST['updateBlogEditor1'];
    $seoTitile = $_POST['seoUpdateTitle'];
    $seoUrl = str_replace(' ', '-', $_POST['seoUpdateUrl']); // Replace spaces with -
    $seoKey = $_POST['seoUpdateKey'];
    $seoDesc = $_POST['updateSeoDesc'];

    $stmt = $conn->prepare("UPDATE blogs SET category = ?, title = ?, description = ?, seo_title = ?, seo_url = ?, seo_key = ?, seo_desc = ? WHERE id = ?");
    $stmt->execute([$category, $title, $description, $seoTitile, $seoUrl, $seoKey, $seoDesc, $updateId]);

    echo "<script>window.location.href = '?status=updated';</script>";
    exit();
}
?>

<!-- JS and CSS Includes -->
<script src="https://cdn.ckeditor.com/4.6.0/full-all/ckeditor.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<main>
    <!-- Insert Form -->
    <div class="seo-details">
        <h3>Insert New Blog Post According to Category</h3>
        <form id="insert-blog-form" method="POST" action="#">
            <div class="form-floating mb-3" id="showPage">
                <h3 class="text-center font-weight-bold">Please Wait....</h3>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="title" required placeholder="Enter Blog Title">
                <label>Blog Title</label>
            </div>
            <div class="form-floating mb-3">
                <textarea name="editor1" id="summernote" cols="30" rows="10"></textarea>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="seoTitle" required placeholder="Enter SEO Title">
                <label>SEO Title</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="seoUrl" required placeholder="Enter SEO URL">
                <label>SEO URL</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="seoKeyword" required placeholder="Write Key-word" style="height: 100px"></textarea>
                <label>Key-word</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="seoDescription" required placeholder="Write short description" style="height: 100px"></textarea>
                <label>Description</label>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-3">
                    <input type="submit" class="btn btn-primary btn-block" value="Insert Blog" name="insertBlog">
                </div>
            </div>
        </form>
    </div>

    <!-- Update Form -->
    <div class="seo-update-details" style="display: none;">
        <h3>Edit Blog To Update</h3>
        <form id="update-blog-form" method="POST" action="#">
            
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="updateBlogCategory" name="updateBlogCategory" readonly>
                <label for="updateBlogCategory">Category</label>
            </div>
            
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="updateBlogtitle" name="updateBlogtitle" required>
                <label for="updateBlogtitle">Title</label>
            </div>
            <div class="form-floating mb-3">
                <ul id="fieldList" style="list-style: none; margin-left: -33px;">
                    <li>
                        <label for="updateBlogEditor1">Blog Description</label>
                        <textarea class="form-control fixborder" id="updateBlogEditor1" name="updateBlogEditor1" required></textarea>
                    </li>
                </ul>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="seoUpdateTitle" name="seoUpdateTitle" required>
                <label for="seoUpdateTitle">SEO Title</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="seoUpdateUrl" name="seoUpdateUrl" required>
                <label for="seoUpdateUrl">SEO URL</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="seoUpdateKey" name="seoUpdateKey" required>
                <label for="seoUpdateKey">SEO Key-word</label>
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" id="updateSeoDesc" name="updateSeoDesc" required style="height: 100px"></textarea>
                <label for="updateSeoDesc">SEO Description</label>
            </div>
            <div class="row justify-content-end">
                <div class="col-lg-3">
                    <input type="hidden" name="updateBlogId" id="updateBlogId">
                    <input type="submit" class="btn btn-primary btn-block" value="Update Blog" name="updateBlog">
                </div>
            </div>
        </form>
    </div>

    <!-- Blog Table -->
    <section class="recent">
        <div class="activity-grid">
            <div class="activity-card">
                <h3 class="text-dark">All Blog List</h3>
                <div class="table-responsive p-3" id="showBlogTable">
                    <h3 class="text-center font-weight-bold">Please Wait....</h3>
                </div>
            </div>
        </div>
    </section>
</main>

<?php require_once 'assets/php/footer.php'; ?>

<!-- CKEditor Config -->
<script>
    CKEDITOR.editorConfig = function (config) {
        config.versionCheck = false;
    };
</script>

<!-- JS Logic -->
<script>
    $(document).ready(function () {
        $('#summernote').summernote({
            tabsize: 2,
            height: 200
        });

        CKEDITOR.replace('updateBlogEditor1', { versionCheck: false });

        $("body").on("click", ".editBlogBtn", function (e) {
            e.preventDefault();
            let editBlogId = $(this).attr("id");

            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: { editBlogId: editBlogId },
                success: function (response) {
                    let data = JSON.parse(response);
                    $(".seo-update-details").show();
                    $(".seo-details").hide();

                    $("#updateBlogCategory").val(data.category);
                    $("#updateBlogtitle").val(data.title);
                    CKEDITOR.instances['updateBlogEditor1'].setData(data.description);
                    $("#seoUpdateTitle").val(data.seo_title);
                    $("#seoUpdateUrl").val(data.seo_url);
                    $("#seoUpdateKey").val(data.seo_key);
                    $("#updateSeoDesc").val(data.seo_desc);
                    $("#updateBlogId").val(data.id);
                }
            });
        });

        $("body").on("click", ".deleteBlogBtn", function (e) {
            e.preventDefault();
            let deleteBlogBtn = $(this).attr("id");

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
                        data: { deleteBlogBtn: deleteBlogBtn },
                        success: function () {
                            Swal.fire('Deleted!', 'Your file has been deleted.', 'success')
                                .then(() => location.reload());
                        }
                    });
                }
            });
        });

        function displayAllPage() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: { action: 'display-page' },
                success: function (response) {
                    $("#showPage").html(response);
                }
            });
        }

        function displayAllBlog() {
            $.ajax({
                url: 'assets/php/process',
                type: 'post',
                data: { action: 'display-blog' },
                success: function (response) {
                    $("#showBlogTable").html(response);
                    $("table").DataTable();
                }
            });
        }

        displayAllPage();
        displayAllBlog();

        // SweetAlert2 for Insert and Update
        const urlParams = new URLSearchParams(window.location.search);
        const status = urlParams.get('status');

        if (status === 'inserted') {
            Swal.fire({
                icon: 'success',
                title: 'Blog Inserted!',
                text: 'Your blog was added successfully.',
                confirmButtonColor: '#3085d6'
            }).then(() => {
                window.location.href = window.location.pathname;
            });
        }

        if (status === 'updated') {
            Swal.fire({
                icon: 'success',
                title: 'Blog Updated!',
                text: 'Your blog was updated successfully.',
                confirmButtonColor: '#3085d6'
            }).then(() => {
                window.location.href = window.location.pathname;
            });
        }
    });
</script>
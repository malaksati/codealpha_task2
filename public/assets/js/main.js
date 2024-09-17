function showModal() {
    document.getElementById("image").click();
}
function showModal1() {
    document.getElementById("image1").click();
}

const chooseFile = document.getElementById("image");
const imgPreview = document.getElementById("img-preview");
chooseFile.addEventListener("change", function () {
    getImgData();
});
function getImgData() {
    const files = chooseFile.files[0];
    if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function () {
            imgPreview.style.display = "block";
            imgPreview.innerHTML = '<img src="' + this.result + '" />';
        });
    }
}
const chooseFile1 = document.getElementById("image1");
const imgPreview1 = document.getElementById("img-preview1");
chooseFile1.addEventListener("change", function () {
    getImgData1();
});
function getImgData1() {
    const files = chooseFile1.files[0];
    if (files) {
        const fileReader = new FileReader();
        fileReader.readAsDataURL(files);
        fileReader.addEventListener("load", function () {
            imgPreview1.style.display = "block";
            imgPreview1.innerHTML = '<img src="' + this.result + '" />';
        });
    }
}

function routeToLikeBlog(id) {
    event.preventDefault();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'/blog_like/'+id,
        type:'get',
        data: {
            CSRF_TOKEN
        },
        success:function(result) {
            $("#"+result['blog']).html(result['blog_count']);
            
        }
    });
}
function routeToComment(id) {
    event.preventDefault();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'/comments/'+id,
        type:'get',
        data: {
            CSRF_TOKEN
        },
        success:function(data) {
            $("#comment_"+id).html(data);
        }
    });
}
function routeToLikeComment(id) {
    event.preventDefault();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'/comment_like/'+id,
        type:'get',
        data: {
            CSRF_TOKEN
        },
        success:function(result) {
            $("#"+result['comment']).html(result['comment_count']);
            
        }
    });
}
function routeToLikeReply(id) {
    event.preventDefault();
    const CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
        url:'/reply_like/'+id,
        type:'get',
        data: {
            CSRF_TOKEN
        },
        success:function(result) {
            $("#"+result['reply']).html(result['reply_count']);
            
        }
    });
}


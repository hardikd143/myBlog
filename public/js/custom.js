$(document).ready(function () {
    $("[data-copy=blogtext]").click(function () {
        // console.log(bText);
        try {
            let bText = $(this).parent().next().children().text();
            navigator.clipboard.writeText(bText);
            $(this).text("copied");
            $(this).addClass("copiedBG");
            setTimeout(() => {
                $(this).text("copy");
                $(this).removeClass("copiedBG");
            }, 500);
        } catch (error) {
            alert("text not copied \nsorry for inconvenience");
        }
    });
    $(".openOptions").click(function () {
        // let prevOpt = $('.openOptions.showOpt')
        // $(prevOpt).removeClass('showOpt')
        // let o = $(prevOpt).next()
        // $(o).css('transform','scale(1,0)');
        $(this).toggleClass("showOpt");

        let option = $(this).next();
        let optHeight = $(option).prop("scrollHeight");
        if ($(this).hasClass("showOpt")) {
            $(option).css("transform", "scale(1,1)");
        } else {
            $(option).css("transform", "scale(1,0)");
        }
    });

    $(".toggle-password").click(function () {
        $(this).toggleClass("openPass");
        let inp = $(this).prev();
        let pass_div = $(this).parent();
        if ($(this).hasClass("openPass")) {
            $(this).addClass("fa-eye-slash");
            $(this).removeClass("fa-eye");
            $(inp).attr("type", "text");
            $(pass_div).addClass("visible");
        } else {
            $(this).removeClass("fa-eye-slash");
            $(this).addClass("fa-eye");
            $(inp).attr("type", "password");
            $(pass_div).removeClass("visible");
        }
    });
    // $('.genePassword').click(function(){
    //     let length = 10,
    //     charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789",
    //     pass = "";
    // for (var i = 0, n = charset.length; i < length; ++i) {
    //     pass += charset.charAt(Math.floor(Math.random() * n));
    // }
    // // Math.random().toString(32).slice(2)
    //     $('#password').val(pass);
    // })



    $(".saveBlog-form").on("submit",function(e){
        e.preventDefault();
        let form = $(this);
        function loadData_save() {
            let addr = window.location.href;
            $("body").load(addr);
            console.clear();
        }
        $.ajax({
            url: form.prop("action"),
            method: form.prop("method"),
            data: form.serialize(),
            dataType: "json",
            success: function (msg) {
                // console.log("Hell");
                // loadData_save();
            },
        });
    })
    $(".addcomment-form").on("submit", function (e) {
        e.preventDefault();
        let form = $(this);
        $.ajax({
            url: form.prop("action"),
            method: form.prop("method"),
            data: form.serialize(),
            dataType: "json",
            success: function (msg) {
                loadData_comment();
            },
        });
        function loadData_comment() {
            let addr = window.location.href;
            $("body").load(addr);
            console.clear();
        }
    });
    for (let i = 0; i < $('.comments_box').length; i++) {
        let ele = $('.comments_box')[i]
        $(ele).hide();
    }
    $('.toggle_comment_box_btn').click(function(e){
        let box  = $(this).next()
        $(box).toggleClass('open');
        if($(box).hasClass('open')){
            $(this).removeClass('fa-chevron-down').addClass('fa-chevron-up')
            $(box).show()
        }
        else{
            $(this).addClass('fa-chevron-down').removeClass('fa-chevron-up')
            $(box).hide()
        }
    })
    // $('.blog_comment_btn').click(function(){
    //     let box = $(this).parent().next()
    //     $(box).toggleClass('show');
    //     if($(box).hasClass('show')){
    //         $(this).addClass('text-danger')
    //         $(box).show()
    //     }
    //     else{
    //         $(this).removeClass('text-danger')
    //         $(box).hide()
    //     }
    // })
});

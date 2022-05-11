$(".bloc-link")
.filter(function () {
    return location.href == this.href;
})
.addClass("active");


$(document).ready(function() {
    $('.addToBag').click( function () {
        let id = $(this).attr('data-id');
        $.ajax({
            url: "/bag/add/" + id,
            method: "POST",
            data: id,
            success: function () {
                console.log(this.url)
            }
        })
        $.ajax({
            url: "/bag/count",
            method: "POST",
            success: function (data) {
                $('.countOfProds').text(data);
            }
        })
        return false;
    })
});
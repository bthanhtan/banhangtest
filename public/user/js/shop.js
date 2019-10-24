// var local_link = "http://localhost/lamchohet/aisuphu-banhang/phailamhet/public/";
var local_link = "http://localhost/Laravel/Ai_template/aisuphu-banhang/phailamhet/public/";
var so_hinh = 0;
function shop_add_to_cart(id) {
    console.log(id);
    $.ajax({
        url: local_link + "user/addtocart/" + id, 
        dataType: 'json',
        type: 'get',
        success: function(response) {
            var countCart = response['count'];
            $('#countCart').html(countCart);
        }
    });
    return false;
}


function shop_remove_cart(rowid,thisButton) {

    console.log('shop_remove_cart');
    console.log(rowid);
    console.log(thisButton);
    $.ajax({
        url: local_link + "user/remove_cart/" + rowid, 
        dataType: 'json',
        type: 'get',
        success: function(response) {
             if (response == 1) {$(thisButton).parents('.row_cart').remove();}
             else {console.log('2')}
        }
    });
    return false;
}

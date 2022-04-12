// $.ajax({
//     url: "http://localhost/aztelekom/php/api/post/read.php",
//     type:'GET',
//     dataType:'json',
//     success: function(res){
//         console.log(res);
//     }
// });

    let $name= $('#product-name');
    let $status=$('#status');
    // $('#add-product').on('submit',function(){

    //     let product={
    //         name:$name.val(),
    //         status:$status.val()
    //     };

    //     $.ajax({
    //         type:'POST',
    //         url: "http://localhost/aztelekom/php/api/post/create.php",
    //         data: product,
    //         success: function(res){
    //             console.log(res);
    //         }
    //     });


    // })
$(document).ready(function(){
    $("#add-product").click(function(e){
        e.preventDefault();

        $.ajax({
            url: "http://localhost/aztelekom/php/api/post/create.php",
            type: "POST",
            data: $('#form').serialize(),
            success:function(res) {
                alert('sdf');
            }

        });
        
        
    })
})


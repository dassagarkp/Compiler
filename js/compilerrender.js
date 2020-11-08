function run(){
    let cppcode1 = document.getElementById('cppcode').value;
    console.log(cppcode1);
    $.post( "post.php",{    cppcode: cppcode1, } );

    $.ajax({
        type: "POST",
        url: "post.php",
        data: {
            cppcode: cppcode1,
        },
        success: function(){
            alert('ok');
        }

    });
}
function save(){

}

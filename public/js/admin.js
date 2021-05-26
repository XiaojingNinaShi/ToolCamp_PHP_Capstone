//onload
$(document).ready(function(){
    console.log("admin page js ready!");
})

const showAddNewProductModal = () => {
    $('#addNewProductModal').modal('show');//显示modal
}

const showViewProductModal = (id='') => {
    //ERROR HERE: HOW TO GET ONE TEA INFO THROUGH PHP MODEL?
    var tea = oneTea($dbh, id);
    console.log(tea);
    $('#viewProductModal').modal('show');//显示modal
}
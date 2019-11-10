var createShowProduct = [];
(function (){
    createShowProduct.showProduct = showProduct;
    function showProduct(){
        if (window.location.pathname == '/products'){
            buttonEditId2.onclick = showShow;

            async function showShow(){
                let response = await fetch('/products/index', {
                headers : {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                method: 'POST',
                body: new FormData(productIdForm1)
                });

                let result = await response.json();

                usernameInput.value = result['inputDetailName'];
                
            }
        }
    }
})();
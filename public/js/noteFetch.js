var createSaveChanges = [];
(function (){
  createSaveChanges.saveChanges = saveChanges;

    function saveChanges(){
      buttonSaveId.onclick = saveChange;
      async function saveChange(){
        let response = await fetch('update', {
          headers : {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
          },
          method: 'POST',
          body: new FormData(saveForm)
          });

          let id     = 0;
          let detail = '';
          let result = await response.json();
          if (response.status == 422){
            textAreaId.value = result['detail'];
            buttonSaveId.hidden = true;
          }else{
            id         = result['hiddenInputName'];    
            detail     = result['detail'];    
            document.getElementById("inputDetailId"+id).value = detail;
            textAreaId.value = document.getElementById("inputDetailId"+id).value;
            textAreaId.readOnly = true;
            buttonSaveId.hidden = true;
          }
      }
  }

})();
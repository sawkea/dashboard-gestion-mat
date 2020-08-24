// label formulaire labelFile
function labelFile(file){
    const txtLabelfile = document.getElementById('ticket');
    txtLabelfile.innerText = file[0].name;
  }
  function labelManuel(file){
    const txtLabelfile = document.getElementById('manuel');
    txtLabelfile.innerText = file[0].name;
  }
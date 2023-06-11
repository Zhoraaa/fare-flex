function asyncLoad(fileUrl, targetElementId) {
  var ajax = new XMLHttpRequest();
  ajax.onreadystatechange = function() {
    if (ajax.readyState === 4 && ajax.status === 200) {
      document.getElementById(targetElementId).innerHTML = ajax.responseText;
    }
  };
  ajax.open('GET', fileUrl, true);
  ajax.send();
}
function asyncClear(blockId) {
  let block = document.getElementById(blockId);
  block.innerHTML = '';
}
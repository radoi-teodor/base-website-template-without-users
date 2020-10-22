function add_parameter(key, value){
  var url = new URL(window.location.href);
  var search_params = url.searchParams;
  search_params.set(key, value);
  url.search = search_params.toString();
  window.location.href = url.toString();
}

function del_parameter(key){
  var url = new URL(window.location.href);
  var search_params = url.searchParams;
  search_params.delete(key);
  url.search = search_params.toString();
  window.location.href = url.toString();
}

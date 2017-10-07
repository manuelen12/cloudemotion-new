koomper.filter('setbyid', Setbyid);
Setbyid.$inject=[];
function Setbyid() {

  return function (items, array, bol, index) {
    var data=false,indice="";
    $.map(array,function(val,ind) {
      if (items.id==val.id) {
        data=true;
        indice=ind;
      }
    })
    if (!data && bol)array.push(items);
    if (!bol) array.splice(indice,1);
    return array;
  }

} 

koomper.filter('setdata', Setdata);
Setdata.$inject=[];
function Setdata() {
  return function (selected, array) {
    $.map(selected,function(val,ind) {
      $.map(array,function(value,index) {
        if (val.id==value.id) value.bol=true;
      })
    })
    return array;
  }

} 

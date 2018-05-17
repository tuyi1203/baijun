$(function()
      {
        $(':radio').parent().addClass("radio-inline");
      //  $(':checkbox').parent().addClass("checkbox-i  nline");

        $('#field').change(function(){
          $.get("{:U('admin/core/lawyer/add/getsubfieldlist/pid/','',false)}" + $('#field').val() + '.json' , null , function(result){
              var result = eval('('+ result +')');
                  console.log(result);
                   if (result != '') {
                    $('#subfield').find('option').remove();
                    var option , data;
                    data = result.data;
                    // eval('var data = result.data');
                    for (index in data) {
                       option += '<option value="'+ index +'">' + data[index] + '</option>';
                    }
                    $('#subfield').append(option);
                  }
                });
          });
      });

function changeName()
{
	$('#fullname').val($('#firstname').val()+$('#lastname').val());
}
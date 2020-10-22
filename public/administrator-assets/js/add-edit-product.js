$(document).ready(function() {

    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function(e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function() {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url'],input[type='number'],textarea"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
        else
            $('form').validate().form();

    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});

function add_specification() {
    var specs_count = $('#specification-container').children().length;
    specs_count++;

    $('#specification-container').append(`
    <tr id="specification-` + String(specs_count) + `">
        <td>
            <input type="text" class="form-control specification-name" name="specification-name-` + String(specs_count) + `" value="" placeholder="Specification name" required>
        </td>

        <td>
            <input type="text" class="form-control specification-value" name="specification-value-` + String(specs_count) + `" value="" placeholder="Specification value" required>
        </td>
        <td>
            <button type="button" class="btn btn-danger w-100 delete-btn" onclick="delete_specification(`+String(specs_count)+`);" name="button">Delete</button>
        </td>
    </tr>
    `);

    $('#specification-'+ String(specs_count) + ' .specification-name').easyAutocomplete({
      data: specifications,
    });

    $('#specifications-number').val(specs_count);
}

function delete_specification(idx){
  $('#specification-'+String(idx)).remove();
  var specs_count = $('#specifications-number').val();

  for (var i = idx+1; i <= specs_count; i++) {
    $('#specification-'+String(i)+' .specification-name').attr('name', 'specification-name-'+String(i-1));
    $('#specification-'+String(i)+' .specification-value').attr('name', 'specification-value-'+String(i-1));

    $('#specification-'+String(i)+' .delete-btn').removeAttr("onclick");
    $('#specification-'+String(i)+' .delete-btn').attr('onclick', 'delete_specification('+String(i-1)+');');

    $('#specification-'+String(i)).attr('id', 'specification-'+String(i-1));
  }
  specs_count--;
  $('#specifications-number').val(specs_count);
}

function delete_existing_specification(id){
  $.ajax({
     type:'POST',
     url:'/administrator/delete-specification',
     data: {
              '_token':$('meta[name="csrf-token"]').attr('content'),
              'specification-id':id,
           },
     success:function(data) {
        $('#existing-specification-'+String(id)).remove();
     }
  });
}

function delete_product_img(img, id){
  $.ajax({
     type:'POST',
     url:'/administrator/delete-product-img',
     data: {
              '_token':$('meta[name="csrf-token"]').attr('content'),
              'img':img,
           },
     success:function(data) {
        $('#img-'+String(id)).remove();
     }
  });
}

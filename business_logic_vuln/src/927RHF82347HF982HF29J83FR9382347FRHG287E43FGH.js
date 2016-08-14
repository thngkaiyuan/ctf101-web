var isFormValidated = false;

function disableButton() {
  $("#submit_btn").attr('disabled','disabled');
}

function enableButton() {
  $("#submit_btn").removeAttr('disabled');
}

function displayError(msg) {
  var errorBox = $("#errors");
  errorBox.html(msg);
  errorBox.show();
  return;
}

function everythingOk() {
  isFormValidated = true;
  enableButton();
  var errorBox = $("#errors");
  errorBox.hide();
}

function somethingWrong(msg) {
  displayError('Error: ' + msg);
  isFormValidated = false;
  disableButton();
}

$(function()
{
  $(document).on('change submit', 'form', function(e)
  {
    if(isEverythingOk()) {
      everythingOk();
    } else {
      e.preventDefault();
    }
  });
});

function isEverythingOk() {
  if(hasDuplicates()) {
    somethingWrong("The same coupon cannot be used more than once!");
    return false;
  }

  var fields = $(".form-control");
  for(var i=0; i < fields.size(); i++) {
    if(!fields[i].value) continue;
    if(isNotValid(fields[i].value)) {
      somethingWrong("You can only use valid coupons!");
      return false;
    }
  }

  everythingOk();
  return true;
}

function validateAndSubmit() {
  isEverythingOk();
  if(!isFormValidated) {
    return false;
  }

  $("#coupons").submit();
}

function isNotValid(code) {
  return code != 'GT2498HTFG8347YUHGTF422498JG' && code != 'G824989GJG8347DUHGTF4228FDJ3';
}

function hasDuplicates() {
  var fields = $(".form-control");
  var originalSize = fields.size();
  var nonDuplicateCodes = new Set();
  for(var i=0; i < fields.size(); i++) {
    if(!fields[i].value) {
      originalSize -= 1;
      continue;
    }
    nonDuplicateCodes.add(fields[i].value);
  }
  return nonDuplicateCodes.size < originalSize;
}

$(function()
{
  $(document).on('click', '.btn-add', function(e)
  {
    e.preventDefault();

    var controlForm = $('.controls form:first'),
    currentEntry = $(this).parents('.entry:first'),
    newEntry = $(currentEntry.clone()).appendTo(controlForm);

    newEntry.find('input').val('');
    controlForm.find('.entry:not(:last) .btn-add')
    .removeClass('btn-add').addClass('btn-remove')
    .removeClass('btn-success').addClass('btn-danger')
    .html('<span class="glyphicon glyphicon-minus"></span>');
    isEverythingOk();
  }).on('click', '.btn-remove', function(e)
  {
    $(this).parents('.entry:first').remove();
    e.preventDefault();
    isEverythingOk();
    return false;
  });
});

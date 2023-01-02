$("input").focus(function () {
  $(this).closest(".input__text").parent().find('label').addClass("float").addClass("focus");
  $(this).closest(".input__text").addClass("float").addClass("focus");
});

$("input").blur(function () {
  $(this).closest(".input__text").parent().find('label').removeClass("focus");
  $(this).closest(".input__text").removeClass("focus");
  if (!$(this).val()) {
    $(this).closest(".input__text").parent().find('label').removeClass("float");
    $(this).closest(".input__text").removeClass("float");
  }
});

jQuery(document).ready(function($) {
  var mediaUploader;

  $("#upload-button").on("click", function(e) {
    e.preventDefault();
    if (mediaUploader) {
      mediaUploader.open();
      return;
    }

    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: "Choose a Profile Picture",
      button: {
        text: "Choose Picture"
      },
      multiple: false
    });

    mediaUploader.on("select", function() {
      attachment = mediaUploader
        .state()
        .get("selection")
        .first()
        .toJSON();
      $("#profile-picture").val(attachment.url);
      $("#profile-picture-preview").css(
        "background-image",
        "url(" + attachment.url + ")"
      );
    });

    mediaUploader.open();
  });

  $("#remove-picture").on("click", function(e) {
    e.preventDefault();
    var answer = confirm(
      "Are you sure you want to remove your Profile Picture?"
    );
    if (answer == true) {
      $("#profile-picture").val("");
      $(".th-form").submit();
    }
    return;
  });

  $("#upload-cover-button").on("click", function(e) {
    e.preventDefault();
    if (mediaUploader) {
      mediaUploader.open();
      return;
    }

    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: "Choose a Cover Picture",
      button: {
        text: "Choose Picture"
      },
      multiple: false
    });

    mediaUploader.on("select", function() {
      attachment = mediaUploader
        .state()
        .get("selection")
        .first()
        .toJSON();
      $("#cover-picture").val(attachment.url);
      $("#cover-picture-preview").css(
        "background-image",
        "url(" + attachment.url + ")"
      );
    });

    mediaUploader.open();
  });

  $("#remove-cover-picture").on("click", function(e) {
    e.preventDefault();
    var answer = confirm("Are you sure you want to remove your Cover Picture?");
    if (answer == true) {
      $("#cover-picture").val("");
      $(".th-form").submit();
    }
    return;
  });
});

<?php require('word_list.php'); ?>
<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <title>Word Scraper and XKCD Password Generator</title>
  </head>

  <body>
    <div id="container">
      <div class="jumbotron page-header shadowbox" id="title"><h1>XKCD Password Generator</h1></div>
      <div class="row">
        <div class="col-sm-6">
          <form class="form shadowbox">
            <div class="form-group formdiv">
              <legend>Number of words (1-9):</legend>
              <input type="number" class="form-control" name="word_count" value="4">
            </div>

            <div class="form-group formdiv">
              <legend>Separation between words:</legend>
              <label class="form-check-label rad"><input type="radio" class="form-check" name="gap_type" value="spaces" checked="checked"> spaces</label>
              <label class="form-check-label rad"><input type="radio" class="form-check" name="gap_type" value="dashes"> dashes</label>
              <label class="form-check-label rad"><input type="radio" class="form-check" name="gap_type" value="underscores"> underscores</label>
              <label class="form-check-label rad"><input type="radio" class="form-check" name="gap_type" value="camel"> camelCase</label>
            </div>

            <div class="form-group formdiv">
              <legend>Other options:</legend>
              <label class="form-check-label"><input type="checkbox" class="form-check-input" name="end_number"> Include number at end?</label>
              <br />
              <label class="form-check-label"><input type="checkbox" class="form-check-input" name="begin_special"> Include special character at beginning?</label>
            </div>
            <button type="submit" class="btn btn-primary btn-lg">Generate!</button>
          </form>
        </div>
        <div class="col-sm-6"><img src = "password_strength.png" id="pass_img" class="shadowbox"></div>
      </div>
      <h2 id="result_label">Result</h2>
      <div class="well shadowbox" id="result_well">
        <?php echo $result;?>
      </div>
    </div>
  </body>
</html>

<?php use_stylesheet('job.css') ?>
 
<h1>Become an Affiliate</h1>
 
<?php include_partial('form', array('form' => $form)) ?>
 
<!-- apps/frontend/modules/affiliate/templates/_form.php -->
<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>
 
<?php echo form_tag_for($form, 'affiliate') ?>
  <table id="job_form">
    <tfoot>
      <tr>
        <td colspan="2">
          <input type="submit" value="Submit" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form ?>
    </tbody>
  </table>
</form>

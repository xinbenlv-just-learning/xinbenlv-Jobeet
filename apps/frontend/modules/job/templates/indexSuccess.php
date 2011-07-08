<h1>Jobeet jobs List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Category</th>
      <th>Type</th>
      <th>Company</th>
      <th>Logo</th>
      <th>Url</th>
      <th>Position</th>
      <th>Location</th>
      <th>Description</th>
      <th>How to apply</th>
      <th>Token</th>
      <th>Is public</th>
      <th>Is activated</th>
      <th>Email</th>
      <th>Expires at</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($jobeet_jobs as $jobeet_job): ?>
    <tr>
      <td><a href="<?php echo url_for('job/show?id='.$jobeet_job->getId()) ?>"><?php echo $jobeet_job->getId() ?></a></td>
      <td><?php echo $jobeet_job->getCategoryId() ?></td>
      <td><?php echo $jobeet_job->getType() ?></td>
      <td><?php echo $jobeet_job->getCompany() ?></td>
      <td><?php echo $jobeet_job->getLogo() ?></td>
      <td><?php echo $jobeet_job->getUrl() ?></td>
      <td><?php echo $jobeet_job->getPosition() ?></td>
      <td><?php echo $jobeet_job->getLocation() ?></td>
      <td><?php echo $jobeet_job->getDescription() ?></td>
      <td><?php echo $jobeet_job->getHowToApply() ?></td>
      <td><?php echo $jobeet_job->getToken() ?></td>
      <td><?php echo $jobeet_job->getIsPublic() ?></td>
      <td><?php echo $jobeet_job->getIsActivated() ?></td>
      <td><?php echo $jobeet_job->getEmail() ?></td>
      <td><?php echo $jobeet_job->getExpiresAt() ?></td>
      <td><?php echo $jobeet_job->getCreatedAt() ?></td>
      <td><?php echo $jobeet_job->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('job/new') ?>">New</a>

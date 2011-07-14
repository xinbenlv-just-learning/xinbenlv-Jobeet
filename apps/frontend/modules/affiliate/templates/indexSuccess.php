<h1>Jobeet affiliates List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Url</th>
      <th>Email</th>
      <th>Token</th>
      <th>Is active</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($jobeet_affiliates as $jobeet_affiliate): ?>
    <tr>
      <td><a href="<?php echo url_for('affiliate/edit?id='.$jobeet_affiliate->getId()) ?>"><?php echo $jobeet_affiliate->getId() ?></a></td>
      <td><?php echo $jobeet_affiliate->getUrl() ?></td>
      <td><?php echo $jobeet_affiliate->getEmail() ?></td>
      <td><?php echo $jobeet_affiliate->getToken() ?></td>
      <td><?php echo $jobeet_affiliate->getIsActive() ?></td>
      <td><?php echo $jobeet_affiliate->getCreatedAt() ?></td>
      <td><?php echo $jobeet_affiliate->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('affiliate/new') ?>">New</a>

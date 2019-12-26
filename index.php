<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">


    <?php
        @include "fetch_data.php";
    ?>

    <form method="post" class="form-inline" style="margin-top: 50px">
        <div class="form-group">
            <label for="pwd">Bath</label>
            <select name="bath" class="form-control">
                <option value="0">All</option>
                <?php for ($i=1;$i<=5;$i++): ?>
                <option  <?php echo isset($_POST['bath']) ? $_POST['bath'] == $i ? "selected":"":""; ?> value="<?php echo $i;?>"><?php echo $i."+";?></option>
                <?php endfor; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="pwd">Beds</label>
            <select name="beds" class="form-control">
                <option value="0">All</option>
                <?php for ($i=1;$i<=5;$i++): ?>
                <option <?php echo isset($_POST['beds']) ? $_POST['beds'] == $i ? "selected":"":""; ?> value="<?php echo $i;?>"><?php echo $i."+";?></option>
                <?php endfor; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>

    <table class="table table-bordered" style="margin-top: 50px">
        <thead>
        <tr>
            <th>Average</th>
            <th>Median</th>
            <th>Low</th>
            <th>High</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($fetched_datas['data']['cityData'] as $cityData): ?>
        <tr>
            <td><?php echo $cityData['average']; ?></td>
            <td><?php echo $cityData['median']; ?></td>
            <td><?php echo $cityData['low']; ?></td>
            <td><?php echo $cityData['high']; ?></td>
        </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>

</body>
</html>

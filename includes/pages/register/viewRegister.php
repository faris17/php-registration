<?php
$title = 'View Records';

$results = $crud->getRegister();
$no = 1;
?>

<div class='container mt-5'>
    <h2><?php echo $title; ?></h2>
    <table class='table mt-4'>
        <thead>
            <th>No</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Date Of Birth</th>
            <th>Contact Number</th>
            <th class='text-center'>action</th>
        </thead>
        <tbody>
            <?php while ($row = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo date('D, d/m/Y', strtotime($row['birth'])); ?></td>
                    <td><?php echo $row['contactNumber'] ?? '-'; ?></td>
                    <td class="text-center">
                    <a href="<?php echo baseUrl . '?page=viewDetail&id=' . $row['id']; ?>"><button class='btn btn-info'> <i class="bi-eye"></i> Detail</button></a>
                        <a href="<?php echo baseUrl . '?page=editRegister&id=' . $row['id']; ?>"><button class='btn btn-primary'> <i class="bi-pencil"></i> Edit</button></a>
                        <a onclick="return confirm('are you sure?')" href="<?php echo baseUrl . '?page=submitRegister&delete=' . $row['id']; ?>"><button class='btn btn-danger'><i class="bi-trash"></i> Delete</button></a>
                    </td>
                </tr>

            <?php } ?>
        </tbody>

    </table>
</div>
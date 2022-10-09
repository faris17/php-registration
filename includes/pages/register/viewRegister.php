<?php
$title = 'View Records';

if (!isset($_GET['pageNo'])) {
    $page = 1;
} else {
    $page = $_GET['pageNo'];
}
$data = $crud->getRegister($page);
$no = $page;
$prev = $page - 1;
$next = $page + 1;
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
            <?php if ($_SESSION['id']) { ?>
                <th class='text-center'>action</th>
            <?php } ?>
        </thead>
        <tbody>
            <?php while ($row = $data['results']->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo date('D, d/m/Y', strtotime($row['birth'])); ?></td>
                    <td><?php echo $row['contactNumber'] ?? '-'; ?></td>
                    <?php if ($_SESSION['id']) { ?>
                        <td class="text-center">
                            <a href="<?php echo baseUrl . '?page=viewDetail&id=' . $row['id']; ?>"><button class='btn btn-info'> <i class="bi-eye"></i> Detail</button></a>
                            <a href="<?php echo baseUrl . '?page=editRegister&id=' . $row['id']; ?>"><button class='btn btn-primary'> <i class="bi-pencil"></i> Edit</button></a>
                            <a onclick="return confirm('are you sure?')" href="<?php echo baseUrl . '?page=submitRegister&delete=' . $row['id']; ?>"><button class='btn btn-danger'><i class="bi-trash"></i> Delete</button></a>
                        </td>
                    <?php } ?>

                </tr>

            <?php } ?>
        </tbody>
    </table>

    <!-- Pagination -->
    <nav aria-label="Page navigation example mt-5">
            <ul class="pagination">
                <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page <= 1){ echo '#'; } else { echo "?page=viewRegister&pageNo=" . $prev; } ?>">Previous</a>
                </li>
                <?php for($i = 1; $i <= $data['totalPages']; $i++ ): ?>
                <li class="page-item <?php if($page == $i) {echo 'active'; } ?>">
                    <a class="page-link" href="?page=viewRegister&pageNo=<?= $i; ?>"> <?= $i; ?> </a>
                </li>
                <?php endfor; ?>
                <li class="page-item <?php if($page >= $data['totalPages']) { echo 'disabled'; } ?>">
                    <a class="page-link"
                        href="<?php if($page >= $data['totalPages']){ echo '#'; } else {echo "?page=viewRegister&pageNo=". $next; } ?>">Next</a>
                </li>
            </ul>
        </nav>
</div>
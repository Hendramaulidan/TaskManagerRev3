<?php $__env->startSection('content'); ?>
<?php if(session('status')): ?>
<?php echo e(session('status')); ?>                        
<?php endif; ?>
    <div class="container">
    <?php
        $hari	= date("d");
        $bulan	= date ("m");
        $tahun	= date("Y");
        $jumlahhari=date("t",mktime(0,0,0,$bulan,$hari,$tahun));
    ?>
<h2 class="text-center text-dark alert alert-light shadow-sm"><?php echo e(date('M')); ?></h2>
    <table class="table">
    <tr class="bg-dark">
        <td class="text text-center text-danger">Sunday</td>
        <td class="text text-center text-light">Monday</td>
        <td class="text text-center text-light">Tuesday</td>
        <td class="text text-center text-light">Wednesday</td>
        <td class="text text-center text-light">Thursday</td>
        <td class="text text-center text-light">Friday</td>
        <td class="text text-center text-light">Saturday</td>
        </tr>
  <?php
    $s=date ("w", mktime (0,0,0,$bulan,1,$tahun));
 
for ($ds=1;$ds<=$s;$ds++) {
    echo "<td></td>";
}
 
    for ($d=1;$d<=$jumlahhari;$d++) {
 
	    if (date("w",mktime (0,0,0,$bulan,$d,$tahun)) == 0) {
        		echo "<tr>"; 
            }
        $warna="#000000"; // warna default
 
        if (date("l",mktime (0,0,0,$bulan,$d,$tahun)) == "Sunday") { $warna="#FF0000"; }
            echo "<td align=center valign=middle> <span style=\"color:$warna\">$d</span></td>"; 
        if (date("w",mktime (0,0,0,$bulan,$d,$tahun)) == 6) { echo "</tr>"; }
    }
echo '</table>'; 
?> </div>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\xampp\htdocs\TaskManager\resources\views/calender.blade.php ENDPATH**/ ?>
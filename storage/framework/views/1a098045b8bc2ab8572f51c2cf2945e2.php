<?php if(session('success')): ?>
<script>
    let message = "<?php echo e(session('success')); ?>";
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 1500,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
    })

    Toast.fire({
        icon: 'success',
        title: message
    })
</script>
<?php endif; ?><?php /**PATH C:\Users\HP\Punto-de-Venta\resources\views/layouts/partials/alert.blade.php ENDPATH**/ ?>
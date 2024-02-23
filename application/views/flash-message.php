<?php if ($this->session->flashdata('success')): ?>
    <script>alert("<?php echo htmlspecialchars($this->session->flashdata('success')); ?>");</script>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <script>alert("<?php echo htmlspecialchars($this->session->flashdata('error')); ?>");</script>
<?php endif; ?>

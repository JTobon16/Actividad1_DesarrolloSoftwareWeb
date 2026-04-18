</div>

<script>
    setTimeout(() => {
        const alert = document.querySelector('.alert');
        if (alert) {
            alert.style.opacity = '0';
            alert.style.transition = 'opacity 0.5s';

            setTimeout(() => {
                alert.style.display = 'none';
            }, 500);
        }
    }, 3000);
</script>

</body>

</html>
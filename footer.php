</main>

    <footer style="background-color: #e0e0e0; text-align: center; padding: 10px; font-size: 14px; color: #333; border-top: 1px solid #ccc;">
        <p>&copy; 2025 Technical University &nbsp; • &nbsp; All rights reserved</p>

        <?php 
        // Close DB connection
        if (isset($conn)) {
            $conn->close(); 
        }
        ?>
    </footer>
</body>
</html>
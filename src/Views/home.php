<?php include './src/Views/layouts/header.php'; ?>

<main>
    
    <h1>Support App</h1>
    <section>
        <a href="?action=create">Add request</a>
    </section>
    
    <section>
    
        <table>
            <thead>
                <th>Topic</th>
                <th>Description</th>
                <th>User</th>
                <th>Create at</th>
            </thead>
            <tbody>
                
            <?php 
            
            foreach ($data as $request) {
                $html = <<<HTML
                <tr>
                    <td>{$request->getTopic()}</td>
                    <td>{$request->getDescription()}</td>
                    <td>{$request->getUserName()}</td>
                    <td>{$request->getCreateAt()}</td>
                    <td>
                        <a href=""><button>Delete</button></a>
                    </td>
                    <td>
                        <a href="?action=edit&&id_request={$request->getId()}"><button>Edit</button></a>
                    </td>
                </tr>
                HTML;
                echo $html;
            }
            ?>  
            </tbody>
        </table>
    
    </section>

</main>

<?php include './src/Views/layouts/footer.php'; ?>


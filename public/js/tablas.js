$(document).ready(function () {
                
    $('#datatable').DataTable( {
        "language": {"url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"}
    } );
    $('#datatable-categorias').DataTable( {
        "language": {"url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"}
    } );
    $('#datatable-marcas').DataTable( {
        "language": {"url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"}
    } );

    var table = $('#datatable').DataTable();
    var tableC = $('#datatable-categorias').DataTable();
    var tableM = $('#datatable-marcas').DataTable();

    //Productos
    table.on('click', '.edit', function(){
        event.preventDefault()
        $tr = $(this).closest('tr');
        if($($tr).hasClass('Child')){
            $tr = $tr.prev('.parent');
        }

        var data = table.row($tr).data();
        console.log(data);

        $('#nombre').val(data[1]);
        $('#precio').val(data[2]);
        $('#costo').val(data[3]);
        $('#cantidad').val(data[4]);
        $('#id_categoria').val(data[6]); 
        $('#id_marca').val(data[7]);

        $('#editForm').attr('action', '/inventario/' + data[0]);
        $('#modalEdit').modal('show');
    })

    table.on('click', '.delete', function(){
        event.preventDefault()
        $tr = $(this).closest('tr');
        if($($tr).hasClass('Child')){
            $tr = $tr.prev('.parent');
        }
        var data = table.row($tr).data();
        console.log(data);

        $('#nombrePE').val(data[1]);

        $('#deleteForm').attr('action', '/inventario/' + data[0]);
        $('#modalDelete').modal('show');
    })

    //Categorias
    tableC.on('click', '.editCat', function(){
        event.preventDefault()
        $tr = $(this).closest('tr');
        if($($tr).hasClass('Child')){
            $tr = $tr.prev('.parent');
        }

        var data = tableC.row($tr).data();
        console.log(data);

        $('#nombreCat').val(data[1]);

        $('#editFormCat').attr('action', '/categoria/' + data[0]);
        $('#modalEditCat').modal('show');
    })

    tableC.on('click', '.deleteCat', function(){
        event.preventDefault()
        $tr = $(this).closest('tr');
        if($($tr).hasClass('Child')){
            $tr = $tr.prev('.parent');
        }
        var data = tableC.row($tr).data();
        console.log(data);

        $('#nombreCE').val(data[1]);

        $('#deleteFormCat').attr('action', '/categoria/' + data[0]);
        $('#modalDeleteCat').modal('show');
    })

    //Marcas
    tableM.on('click', '.editMarca', function(){
        event.preventDefault()
        $tr = $(this).closest('tr');
        if($($tr).hasClass('Child')){
            $tr = $tr.prev('.parent');
        }

        var data = tableM.row($tr).data();
        console.log(data);

        $('#nombreMarca').val(data[1]);

        $('#editFormMarca').attr('action', '/marca/' + data[0]);
        $('#modalEditMarca').modal('show');
    })

    tableM.on('click', '.deleteMarca', function(){
        event.preventDefault()
        $tr = $(this).closest('tr');
        if($($tr).hasClass('Child')){
            $tr = $tr.prev('.parent');
        }
        var data = tableM.row($tr).data();
        console.log(data);

        $('#nombreME').val(data[1]);

        $('#deleteFormMarca').attr('action', '/marca/' + data[0]);
        $('#modalDeleteMarca').modal('show');
    })

    //Oculta y muestra tablas
    $("#productosHS").click(function(){
        $(".tsp").slideToggle('slow');
        $("i", this).toggleClass("fas fa-chevron-right fas fa-chevron-up");
    });

    $("#categoriasHS").click(function(){
        $(".tsc").slideToggle('slow');
        $("i", this).toggleClass("fas fa-chevron-right fas fa-chevron-up");
    });

    $("#marcasHS").click(function(){
        $(".tsm").slideToggle('slow');
        $("i", this).toggleClass("fas fa-chevron-right fas fa-chevron-up");
    });
});
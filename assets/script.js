$(document).ready( function() {
    $('.dataTable').dataTable({
        responsive : true,
        paging : true,
        lengthChange : false,
        info : false,
        autoWidth : true,
        order : [[0, 'desc']],
        language : {
            'search' : '<div class="input-group"><div class="input-group-prepend"><div class="input-group-text material-icons">search</div>',
            'zeroRecords' : 'Sem registro encontrado',
            'paginate' : {
                'first' : '<<',
                'last' : '>>',
                'previous' : '<',
                'next' : '>'
            }
        }
    });

    $('.dataTableCres').dataTable({
        responsive : true,
        paging : true,
        lengthChange : false,
        info : false,
        autoWidth : true,
        language : {
            'search' : '<div class="input-group"><div class="input-group-prepend"><div class="input-group-text material-icons">search</div>',
            'zeroRecords' : 'Sem registro encontrado',
            'paginate' : {
                'first' : '<<',
                'last' : '>>',
                'previous' : '<',
                'next' : '>'
            }
        }
    });

    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        dots:false,
        nav:true
    })
});

jQuery(function ($) {
    $('.tel').mask('(99) 9999-9999');
    $('.cel').mask('(99) 9 9999-9999');
});

myapp = angular.module('myapp', []);
header = {'Content-Type': 'application/x-www-form-urlencoded'};

myapp.controller('catinit', function ($scope, $http) {
    $scope.ini = function () {
        $scope.mtitle = 'Cadastro de categoria';
        $scope.mbutton = 'add';
        $scope.id = 0;
        $('#categorias').modal('show');
    };

    $scope.buscar = function (id) {
        $http({
            method: 'get',
            url: './catget',
            params: {id: id}
        }).then(function (retorno) {
            data = retorno.data;
            $scope.nome = data.nome;
            $scope.id = data.id;
            $scope.mtitle = 'Edição de categoria';
            $scope.mbutton = 'save';
            $('#categorias').modal('show');
        });
    };

    $scope.desativa = function (id) {
        $http({
            method: 'post',
            url: './cat/desativa',
            data: $.param({id: id}),
            headers: header
        }).then(function () {
            $('#b' + id).remove();
        });
    };

    $scope.reativa = function (id) {
        $http({
            method: 'post',
            url: './cat/reativa',
            data: $.param({id: id}),
            headers: header
        }).then(function () {
            $('#b' + id).remove();
        });
    }
});

myapp.controller('corinit', function ($scope, $http) {
    $scope.ini = function () {
        $scope.mtitle = 'Cadastro de cor';
        $scope.mbutton = 'add';
        $scope.id = 0;
        $('#cores').modal('show');
    };

    $scope.buscar = function (id) {
        $http({
            method: 'get',
            url: './corget',
            params: {id: id}
        }).then(function (retorno) {
            data = retorno.data;
            $scope.nome = data.cor;
            $scope.id = data.id;
            $scope.mtitle = 'Edição de cor';
            $scope.mbutton = 'save';
            $('#cores').modal('show');
        });
    };

    $scope.desativa = function (id) {
        $http({
            method: 'post',
            url: './cor/desativa',
            data: $.param({id: id}),
            headers: header
        }).then(function () {
            $('#b' + id).remove();
        });
    };

    $scope.reativa = function (id) {
        $http({
            method: 'post',
            url: './cor/reativa',
            data: $.param({id: id}),
            headers: header
        }).then(function () {
            $('#b' + id).remove();
        });
    }
});

myapp.controller('iedit', function ($scope, $http) {
    $scope.deletar = function (id, name) {
        $http({
            method: 'post',
            url: '../phodel',
            params: {nome: name, id: id}
        }).then(function (retorno) {
            $('#' + retorno.data).remove();
        });
    };
});

myapp.controller('uinit', function ($scope, $http) {
    $scope.ini = function () {
        $scope.mtitle = 'Cadastro de usuario';
        $scope.mbutton = 'add';
        $scope.id = 0;
        $('#user').modal('show');
    };

    $scope.key = function (id) {
        $http({
            method: 'get',
            url: './userget',
            params: {id: id}
        }).then(function (retorno) {
            data = retorno.data;
            $scope.id = data.id;
            $scope.mptitle = 'Alteração de senha';
            $scope.mpbutton = 'save';
            $('#password').modal('show');
        });
    };

    $scope.buscar = function (id) {
        $http({
            method: 'get',
            url: './userget',
            params: {id: id}
        }).then(function (retorno) {
            data = retorno.data;
            $scope.id = data.id;
            $scope.nome = data.nome;
            $scope.login = data.login;
            $scope.mtitle = 'Edição de usuario';
            $scope.mbutton = 'save';
            $('#user').modal('show');
        });
    }
});

myapp.controller('vedit', function ($scope, $http) {
    $scope.buscar = function (id) {
        $http({
            method: 'get',
            url: './vitrineget',
            params: {id: id}
        }).then(function (retorno) {
            data = retorno.data;
            $scope.rand1 = data.rand_v1;
            $scope.rand2 = data.rand_v2;
            $scope.rand3 = data.rand_v3;
            $scope.rand4 = data.rand_v4;
            $scope.rand5 = data.rand_v5;
            $scope.rand6 = data.rand_v6;
        });
    }
});

myapp.controller('sledit', function ($scope, $http) {
    $scope.deletar = function (id, nome) {
        $http({
            method: 'post',
            url: './fodel',
            params: {name: nome, id: id}
        }).then(function (retorno) {
            $('#' + retorno.data).remove();
            $('#url_' + retorno.data).get(0).value = '';
        });
    }
});

myapp.controller('ihome', function ($scope, $http) {
    $scope.desativa = function (id) {
        $http({
            method: 'post',
            url: './item/desativa',
            data: $.param({id: id}),
            headers: header
        }).then(function () {
            $('#b' + id).remove();
        });
    };

    $scope.reativa = function (id) {
        $http({
            method: 'post',
            url: './item/reativa',
            data: $.param({id: id}),
            headers: header
        }).then(function () {
            $('#b' + id).remove();
        });
    }
});

myapp.controller('pview', function ($scope, $http) {
    $scope.remove = function (id) {
        $http({
            method: 'post',
            url: './pedidos/remove',
            data: $.param({id: id}),
            headers: header
        }).then(function () {
            $('#u' + id).remove();
        });
    };

    $scope.ver = function (id) {
        $http({
            method: 'post',
            url: './pedidos/pver',
            data: $.param({pedido: id}),
            headers: header
        }).then(function (retorno) {
            $scope.numero = id;
            $scope.datap = retorno.data.data;
            $scope.total = retorno.data.valor;
            $scope.itens = retorno.data.item;
            $('#modal').modal('show');
        });
    }
});

myapp.controller('rhome', function ($scope, $http) {
    $scope.buscar = function (id) {
        $http({
            method: 'post',
            url: './requisicoes/detalhes',
            data: $.param({pedido: id}),
            headers: header
        }).then(function (retorno) {
            dados = retorno.data;
            $scope.mtitle = 'Detalhes do orçamento nº ' + id;
            $scope.cnome = dados.comprador.nome;
            $scope.cemail = dados.comprador.email;
            $scope.ctel = dados.comprador.telefone;
            $scope.ccel = dados.comprador.celular;
            $scope.total = dados.valor;
            $scope.data = dados.data;
            $scope.pcod = id;
            $scope.itens = dados.item;
            $('#detalhes').modal('show');
        });
    };

    $scope.remove = function (id) {
        $http({
            method: 'post',
            url: './requisicoes/remover',
            data: $.param({id: id}),
            headers: header
        }).then(function () {
            $('#u' + id).remove();
        });
    };

    $scope.promover = function (id) {
        $http({
            method: 'post',
            url: './requisicoes/promover',
            data: $.param({id: id}),
            headers: header
        }).then(function () {
            $('#u' + id).remove();
        });
    }
});

myapp.controller('vendas', function ($scope, $http) {
    $scope.buscar = function (id) {
        $http({
            method: 'post',
            url: './requisicoes/detalhes',
            data: $.param({pedido: id}),
            headers: header
        }).then(function (retorno) {
            dados = retorno.data;
            $scope.mtitle = 'Detalhes do Orçamento nº ' + id;
            $scope.cnome = dados.comprador.nome;
            $scope.cemail = dados.comprador.email;
            $scope.ctel = dados.comprador.telefone;
            $scope.ccel = dados.comprador.celular;
            $scope.pcod = id;
            $scope.qtd = dados.qtd;
            $scope.data = dados.data;
            $scope.venda = dados.fechado;
            $scope.total = dados.valor;
            $scope.itens = dados.item;
            $('#detalhes').modal('show');
        });
    }
});

myapp.directive('ckEditor', function () {
    return {
        require: '?ngModel',
        link: function (scope, elm, attr, ngModel) {
            var ck = CKEDITOR.replace(elm[0]);

            if (!ngModel) return;

            ck.on('pasteState', function () {
                scope.$apply(function () {
                    ngModel.$setViewValue(ck.getData());
                });
            });

            ngModel.$render = function (value) {
                ck.setData(ngModel.$viewValue);
            };
        }
    };
});
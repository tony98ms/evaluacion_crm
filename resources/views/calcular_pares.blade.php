@extends('layouts.nav')
@section('content')
    <div class="" id="pares">
        <p class="text-justify font-weight-bold">
            Obtener el numero de pares de una matriz, cuya diferencia es igual al valor objetivo.</p>
        <div class="row">
            <div class="col-lg-4 mb-lg-0 mb-2">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-light font-weight-bold">Realizar Calculo</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="">Ingrese el valor objetivo</label>
                                <input type="text" class="form-control" v-mask="numberMask"
                                    placeholder="Ingrese el valor objetivo" v-model="valor">
                                <small class="error-message text-danger font-weight-bold"
                                    v-if="errors.has('valor_objetivo')">
                                    @{{ errors.get('valor_objetivo') }}</small>
                            </div>
                            <div class="col-lg-12">
                                <label for="">Ingrese los valores del arreglo</label>
                                <input type="text" class="form-control"
                                    placeholder="Ingrese los valores separados por espacios" v-mask="arrayMask"
                                    v-model="arreglo">
                                <small class="error-message text-danger font-weight-bold" v-if="errors.has('arreglo')">
                                    @{{ errors.get('arreglo') }}</small>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-danger btn-sm btn-block my-1"
                                    @click.prevent="calcular">Calcular</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h5 class="card-title text-light font-weight-bold">Lista de Peticiones</h5>
                    </div>
                    <div class="card-body">
                        <h4 class="text-center font-weight-bold"> </h4>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="p-0 table-dark">
                                    <tr>
                                        <th class="p-0 px-1 text-light">Valor objetivo</th>
                                        <th class="p-0 px-1 text-light">Arreglo</th>
                                        <th class="p-0 px-1 text-light">Petición</th>
                                        <th class="p-0 px-1 text-light">N° Pares</th>
                                        <th class="p-0 px-1 text-light">Hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(prueba,index) in pruebas">
                                        <td class="text-right" style="vertical-align: middle">@{{ prueba.valor_objetivo }}</td>
                                        <td class="text-right" style="vertical-align: middle">@{{ prueba.arreglo }}</td>
                                        <td>
                                            <vue-json-pretty :data="prueba.peticion" :key="prueba.hora"
                                                :deep="1" />
                                        </td>
                                        <td class="text-right" style="vertical-align: middle">@{{ prueba.respuesta }}</td>
                                        <td style="vertical-align: middle">@{{ prueba.hora }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>
        const token = '99|mvqZgYdev8Cl2BVAfnprcCfV5hkoWTloZil1nZGG';
        let url = '{{ route_api('pares.store') }}';
        console.log(url);
        const config = {
            headers: {
                Authorization: `Bearer ${token}`
            }
        };
        const pares = new Vue({
            el: "#pares",
            name: "ParesComponent",
            data: {
                pruebas: [],
                mask: ['^[0-9]+$'],
                valor: '',
                arreglo: '',
                errors: new Errors(),

            },
            computed: {
                getArreglos() {
                    if (this.arreglo.trim() === '') return [];
                    return this.arreglo
                        .replace(/\s+/g, " ")
                        .trim()
                        .split(" ")
                        .map(element => {
                            return Number(element)
                        });
                }
            },
            methods: {
                /**
                 * Validación para el input de valor de objetivo
                 **/
                numberMask(value) {
                    return [value.replace(/\D+/g, '')];
                },
                /**
                 * Validación para el input de arreglos de enteros
                 **/
                arrayMask(value) {
                    return [value.replace(/[a-zA-Z-_\s\W]+$/g, " ")];
                },
                /**
                 * Obtener un objeto para realizar la petición
                 **/
                getData() {
                    return {
                        valor_objetivo: this.valor,
                        arreglo: this.getArreglos
                    }
                },
                /**
                 * Función para obtener los el numero de pares
                 **/
                calcular() {
                    let set = this;
                    Swal.fire({
                        title: 'Deseas realizar la petición?',
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonText: 'Si, Realizar',
                        confirmCancelText: 'Cancelar',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            set.errors.record({});
                            axios.post(url, set.getData(), config)
                                .then(response => {
                                    console.log(response);
                                    set.setResponse(response);
                                    set.clearData();
                                    Swal.fire({
                                            title: response.data.message,
                                            text: response.data.text ?? ''
                                        })
                                        .then((r) => {

                                        });
                                }).catch(function(error) {
                                    if (error.response.status == 422) {
                                        iziToast.error({
                                            title: 'TonyStore',
                                            message: "Tienes Errores de Validación",
                                            position: 'topRight'
                                        });
                                        set.errors.record(error.response.data.errors);
                                    }
                                });
                        }
                    });
                },
                /**
                 * Función para almacenar la respuesta en un arreglo y listar en una tabla
                 **/
                setResponse({
                    data
                }) {
                    let prueba = {
                        peticion: this.getData(),
                        respuesta: data.value,
                        valor_objetivo: this.valor,
                        arreglo: JSON.stringify(this.getArreglos),
                        hora: moment().format('YYYY-MM-DD h:mm:ss')
                    }
                    this.pruebas.push(prueba);
                },
                /**
                 * Función para limpiar los inputs
                 **/
                clearData() {
                    this.valor = '';
                    this.arreglo = '';
                    this.errors.record({});
                }
            }
        });
    </script>
@endsection

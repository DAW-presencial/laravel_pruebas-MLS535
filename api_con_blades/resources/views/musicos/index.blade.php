<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <div class="container">

        <div class="row">
            <table id="principal" class="table table-striped table-hover table-bordered my-3 text-center align-middle">
            </table>
        </div>

        <div class="row">
            <h3>Consulta un músico</h3>
            <div id="consulta" class="col-12 col-lg-6 my-3">Haz click a consultar uno de los músicos para poder visualizarlo.</div>
        </div>

        <div class="row">

            <!--todo Formulario crear -->

            <div class="col-5 border">
                <h4 class="text-center">Registra un nuevo músico</h4>
                <form class="d-flex justify-content-around align-items-center flex-column">

                    <label for="nombre">{{__("Name")}}:</label>
                    <input type="text" name="nombre" id="nombre" required value="{{old('nombre')}}">

                    <div class="col-md-6 my-3">
                        <label for="categoria">Categoría:</label>
                        <select class="form-select" name='categoria' id="categoria">
                            <option value="En una banda">En una banda</option>
                            <option value="Solista">Solista</option>
                        </select>
                    </div>

                    <label for="salario">@lang("Salary")::</label>
                    <input class="mb-3" type="number" min="1" name="salario" id="salario" required>

{{--                    <label for="experiencia">Experiencia:</label>--}}
{{--                    <input class="mb-3" type="text" name="experiencia" id="experiencia" required>--}}

                    <div class="form-group">
                        <label class="form-label" for="experiencia" >Experiencia</label><br>
                        <label> <input type="radio" name="experiencia" class="form-control radiobotones" value="Mucha" id="experiencia"/>Mucha</label>
                        <label> <input type="radio" name="experiencia" class="form-control radiobotones" value="Poca" id="experiencia"/>Poca</label>
                    </div>

                    <label for="descripcion">Descripción:</label>
                    <textarea class="mb-3" name="descripcion" id="descripcion" rows="2" required></textarea>

                    <label for="fecha">¿Cuándo empezaste a tocar?</label>
                    <input class="mb-3" type="date" name="fecha" id="fecha" required>

                    <input type="submit" onclick="nuevoMusico()" class="btn btn-success my-3" value="Añadir músico">
                </form>
            </div>

            <!--todo Formulario editar -->

            <div class="col-6 border">
                <h4 class="text-center">Editar músico</h4>
                <form class="d-flex justify-content-around align-items-center flex-column">

                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" id="nombreedit" required>

                    <div class="col-md-6 my-3">
                        <label for="categoria">Categoría:</label>
                        <select class="form-select" name='categoria' id="categoriaedit">
                            <option value="En una banda">En una banda</option>
                            <option value="Solista">Solista</option>
                        </select>
                    </div>

                    <label for="salario">Salario:</label>
                    <input class="mb-3" type="number" min="1" name="salario" id="salarioedit" required>

{{--                    <label for="experiencia">Experiencia:</label>--}}
{{--                    <input class="mb-3" type="text" name="experiencia" id="experienciaedit" required>--}}

                    <div class="form-group">
                        <label class="form-label" for="experiencia" >Experiencia</label><br>
                        <label> <input type="radio" name="experiencia" class="form-control radiobotones" value="Mucha" id="experienciaedit"/>Mucha</label>
                        <label> <input type="radio" name="experiencia" class="form-control radiobotones" value="Poca" id="experienciaedit"/>Poca</label>
                    </div>
                    <label for="descripcion">Descripción:</label>
                    <textarea class="mb-3" name="descripcion" id="descripcionedit" rows="2" required></textarea>

                    <label for="fecha">¿Cuándo empezaste a tocar?</label>
                    <input class="mb-3" type="date" name="fecha" id="fechaedit" required>

                    <input type="submit" id="edita" class="btn btn-success my-3" value="Editar músico">
                </form>
            </div>

        </div>
        <a href="/api/musician"><button class="btn btn-outline-secondary m-5 justify-content-center">Visualizar JSON</button></a>
    </div>

<script src="js/apirest.js"></script>

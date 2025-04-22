

<h2 class="text-lg font-semibold text-gray-800 mb-4">Grupos disponibles para Nivel <span id="nivel-actual">{{ $nivel }}</span></h2>

@if(count($grupos) > 0)
    <div class="space-y-4">
        @foreach($grupos as $grupo)
            <label class="block grupo-card border rounded-lg p-4 cursor-pointer">
                <div class="flex items-start">
                    <input type="radio" name="id_grupo" value="{{ $grupo['id'] }}" class="mt-1 mr-3" required>
                    <div class="flex-1">
                        <div class="flex justify-between">
                            <h3 class="font-bold text-gray-800">{{ $grupo['nombre_grupo'] }}</h3>
                            <span class="text-sm px-2 py-1 rounded-full {{ $grupo['cupo_disponible'] > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $grupo['cupo_disponible'] }} cupos disponibles
                            </span>
                        </div>
                        
                        <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div class="flex items-start">
                                <i class="fas fa-clock text-gray-500 mt-1 mr-2"></i>
                                <div>
                                    <p class="font-medium text-gray-700">Horario</p>
                                    <p class="text-sm text-gray-600">{{ $grupo['horario'] }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-chalkboard-teacher text-gray-500 mt-1 mr-2"></i>
                                <div>
                                    <p class="font-medium text-gray-700">Profesor</p>
                                    <p class="text-sm text-gray-600">{{ $grupo['profesor'] }}</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <i class="fas fa-door-open text-gray-500 mt-1 mr-2"></i>
                                <div>
                                    <p class="font-medium text-gray-700">Aula</p>
                                    <p class="text-sm text-gray-600">{{ $grupo['aula'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </label>
        @endforeach
    </div>
@else
    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 rounded-lg">
        <div class="flex">
            <div class="flex-shrink-0">
                <i class="fas fa-exclamation-triangle text-yellow-500"></i>
            </div>
            <div class="ml-3">
                <p class="text-sm text-yellow-700">
                    No hay grupos disponibles para el nivel {{ $nivel }} en este momento.
                    Por favor contacta al departamento de lenguas extranjeras.
                </p>
            </div>
        </div>
    </div>
@endif
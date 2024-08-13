<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cita;
use App\Models\Medico;
use Illuminate\Http\Request;

class CitaController extends Controller
{

    public function PacienteMisCitas()
    {
        $citas = Cita::where('paciente_id', auth()->user()->paciente->id)
                    ->orderBy('fecha_hora', 'desc')
                    ->get();

        return view('pages.paciente.citas.index', compact('citas'));
    }

    public function MedicoMisCitas()
    {
        $citas = Cita::where('medico_id', auth()->user()->medico->id)
                    ->where('status', '!=', 'cancelada')
                    ->orderBy('fecha_hora', 'desc')
                    ->get();

        return view('pages.medico.citas.index', compact('citas'));
    }

    public function citasDisponibles($medico_id)
{
    $medico = Medico::findOrFail($medico_id);
    $hoy = now();
    $diasSemana = [];
    $horas = [];
    $citasDisponibles = [];
    $diasEsp = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes'];

    $contadorDiasHabiles = 0;
    $fecha = $hoy->copy();

    // Generar los días de la semana hasta completar 5 días hábiles
    while ($contadorDiasHabiles < 5) {
        if ($fecha->isWeekday()) {
            $dia = $fecha->format('l'); // Nombre del día
            $diasSemana[] = $dia;
            $contadorDiasHabiles++;

            // Generar las horas solo la primera vez
            if (empty($horas)) {
                $inicioDia = $fecha->copy()->setTime(9, 0);
                $finDia = $fecha->copy()->setTime(17, 30);
                while ($inicioDia < $finDia) {
                    $hora = $inicioDia->format('H:i');

                    // Verificar si la hora es mayor o igual a la hora actual solo para el día de hoy
                    if ($fecha->isSameDay($hoy) && $inicioDia->lt($hoy)) {
                        $inicioDia->addMinutes(30);
                        continue;
                    }

                    $horas[] = $hora;
                    $inicioDia->addMinutes(30);
                }
            }

            // Asignar las horas disponibles a cada día
            foreach ($horas as $hora) {
                $citasDisponibles[$dia][$hora] = $fecha->copy()->setTimeFromTimeString($hora)->format('Y-m-d H:i:s');
            }
        }
        $fecha->addDay();

        // Resetear las horas después del primer día
        if ($contadorDiasHabiles == 1) {
            $horas = [];
        }
    }

    // Filtrar horarios ya ocupados
    $citasOcupadas = Cita::where('medico_id', $medico_id)
                        ->whereBetween('fecha_hora', [$hoy, $fecha])
                        ->get();

    foreach ($citasOcupadas as $cita) {
        $dia = $cita->fecha_hora->format('l');
        $hora = $cita->fecha_hora->format('H:i');
        unset($citasDisponibles[$dia][$hora]);
    }

    return view('pages.paciente.medicos.show', compact('diasSemana', 'horas', 'citasDisponibles', 'medico', 'diasEsp', 'medico_id'));
}

    
    
    

    public function reservar(Request $request)
    {
        $request->validate([
            'medico_id' => 'required|exists:medicos,id',
            'fecha_hora' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $paciente_id = auth()->user()->paciente->id;

        // Verificar que la cita esté disponible
        $existeCita = Cita::where('medico_id', $request->medico_id)
                        ->where('fecha_hora', $request->fecha_hora)
                        ->exists();

        if ($existeCita) {
            return redirect()->back()->withErrors(['error' => 'Este horario ya está reservado.']);
        }

        Cita::create([
            'medico_id' => $request->medico_id,
            'paciente_id' => $paciente_id,
            'fecha_hora' => $request->fecha_hora,
            'status' => 'pendiente',
        ]);

        // return redirect()->route('medicos')->with('success', 'Cita reservada con éxito.');
        return redirect()->back()->with('success', 'Cita reservada con éxito.');
    }
    
    public function CitaCancelar(Cita $cita)
    {
        // Verificar si la cita aún no ha sido cancelada
        if ($cita->status != 'cancelada') {
            $cita->status = 'cancelada';
            $cita->save();

            return redirect()->back()->with('success', 'Cita cancelada correctamente.');
        }

        return redirect()->back()->with('error', 'La cita ya ha sido cancelada.');
    }

    public function CitaAceptar(Cita $cita)
    {
        // Verificar si la cita aún no ha sido aceptada
        if ($cita->status != 'aceptada') {
            $cita->status = 'aceptada';
            $cita->save();

            return redirect()->back()->with('success', 'Cita aceptada correctamente.');
        }

        return redirect()->back()->with('error', 'La cita ya ha sido aceptada.');
    }

    public function CitaCompletar(Cita $cita)
    {
        // Verificar si la cita aún no ha sido completada
        if ($cita->status != 'completada') {
            $cita->status = 'completada';
            $cita->save();

            return redirect()->back()->with('success', 'Cita completada correctamente.');
        }

        return redirect()->back()->with('error', 'La cita ya ha sido completada.');
    }

    public function PacienteCitaChat(Cita $cita)
    {
        return view('pages.paciente.citas.chat', compact('cita'));
    }

    public function MedicoCitaChat(Cita $cita)
    {
        return view('pages.medico.citas.chat', compact('cita'));
    }

}

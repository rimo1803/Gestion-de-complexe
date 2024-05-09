@extends('layouts.mainuser')
@section('content')
<br>
        <h2>Les absences du personnel {{ $personnels->Nomper }} {{ $personnels->prenomper }}</h2>
            <div class="p-6 px-0 overflow-scroll">
              <table class="w-full text-left table-auto min-w-max">
                <thead>
                  <tr>
                    <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                      <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                        Id
                      </p>
                    </th>
                    <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                      <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                        Date de debut d'absence
                      </p>
                    </th>
                    <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                      <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                        Date de fin d'absence
                      </p>
                    </th>
                    <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                      <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                        Type d'absence
                      </p>
                    </th>
                    <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                      <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                        Justification
                      </p>
                    </th>
                    <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
                      <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                      </p>
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach($absences as $absence)
                  <tr>
                    <td class="p-4 border-b border-blue-gray-50">
                      <div class="flex items-center gap-3">
                        <p class="block font-sans text-sm antialiased font-bold leading-normal text-blue-gray-900">
                            {{ $absence->id }}
                        </p>
                      </div>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                      <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                        {{ $absence->date_debut }}
                      </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                      <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                        {{ $absence->date_fin }}
                      </p>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                      <div class="w-max">
                        <div
                          class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-green-500/20">
                          <span class="">{{ $absence->type_abscence }}</span>
                        </div>
                      </div>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                      <div class="flex items-center gap-3">
                        <div class="flex flex-col">
                          <p
                            class="block font-sans text-sm antialiased font-normal leading-normal capitalize text-blue-gray-900">
                            {{ $absence->justification }}
                          </p>
                        </div>
                      </div>
                    </td>
                    <td class="p-4 border-b border-blue-gray-50">
                      <button>
                        <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                          justifier votre absence
                        </span>
                      </button>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
    </div>
@endsection






















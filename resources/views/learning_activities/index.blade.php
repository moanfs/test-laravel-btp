@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        @if ($message = Session::get('danger'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="d-flex justify-content-between my-3">
            <h5>Learning Activity - Januari s/d Juni 2024</h5>
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createModal">Create New Activity</button>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Metode</th>
                    @foreach(['January', 'February', 'March', 'April', 'May', 'June'] as $month)
                    <th class="col-2">{{ $month }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($metodes as $metode)
                    <tr>
                        <td>{{ $metode->name }}</td>
                        @foreach(['01', '02', '03', '04', '05', '06'] as $month)
                            @php
                                $monthKey = '2024-' . $month;
                                $activities = $groupedActivities[$metode->id][$monthKey] ?? [];
                            @endphp
                            <td>
                                @foreach ($activities as $activity)
                                    <ul>
                                        <li>
                                            <button class="btn btn-link d-flex text-black text-start text-decoration-none"
                                                data-toggle="modal"
                                                data-target="#editModal{{ $activity->id }}"
                                            >
                                            {{ $activity->title }} <br>
                                            ({{ $activity->start_date->format('d/m/Y') }} - {{ $activity->end_date->format('d/m/Y') }})
                                            </button>
                                        </li>
                                    </ul>
                                     <!-- Modal Edit -->
                                    <div class="modal fade" id="editModal{{ $activity->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel{{ $activity->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header d-flex justify-content-between">
                                                    <h5 class="modal-title" id="editModalLabel{{ $activity->id }}">View Activity: {{ $activity->title }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('learning-activity.update', $activity->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="form-group">
                                                            <label for="method">Metode</label>
                                                            <select class="form-select" aria-label="Default select example" name="metode_id">
                                                              @foreach($metodes as $metode)
                                                              <option value="{{ $metode->id }}" {{ $metode->id == $activity->metode_id ? 'selected' : '' }}>{{ $metode->name }}</option>
                                                              @endforeach
                                                            </select>
                                                          </div>
                                                        <div class="form-group">
                                                            <label for="activity_title">Title</label>
                                                            <input type="text" class="form-control" id="activity_title" name="title" value="{{ $activity->title }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="start_date">Start Date</label>
                                                            <input type="date" class="form-control" id="start_date"  name="start_date" value="{{ $activity->start_date->format('Y-m-d') }}" min="2024-01-01" max="2024-06-30">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="end_date">End Date</label>
                                                            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $activity->end_date->format('Y-m-d') }}" min="2024-01-01" max="2024-06-30">
                                                        </div>
                                                        <div class="my-4 d-flex gap-2 justify-content-end">
                                                            <button type="submit" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                    <div class="my-4 d-flex gap-2 justify-content-end">
                                                        <form action="{{ route('learning-activity.destroy', $activity->id) }}" method="POST" >
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('learning_activities.create')
    {{-- @include('learning_activities.edit') --}}

@endsection

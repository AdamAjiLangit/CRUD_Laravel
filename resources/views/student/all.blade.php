@extends('layouts.main')
<style>
    #button:hover {
        background-color: transparent;
    }

    .form-group {
        margin-top: 20px;
    }

    table {
        border-collapse: separate;
        border-spacing: 0 2px;
    }

    th,
    td {
        padding: 5px 10px;
    }
</style>

@section('container')
    <div class="row justify-content-center mb-3">
        <div class="col-md-6">
            <form action="/student/all" method="GET">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search"
                        value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <div class="col-md-3">
            <form action="/student/all" method="GET">
                <div class="input-group mb-3">
                    <select class="form-select" name="gender_id">
                        <option value="">-- Select Gender --</option>
                        @foreach ($gender as $genderOption)
                            <option value="{{ $genderOption->id }}"
                                {{ $selectedGender == $genderOption->id ? 'selected' : '' }}>
                                {{ $genderOption->gender }}
                            </option>
                        @endforeach
                    </select>
                    <button class="btn btn-primary" type="submit">Filter</button>
                </div>
            </form>
        </div>
    </div>

    @if ($students->count())
        {{-- tempat content --}}
        <h1>Tabel Data Siswa</h1>
        <a type="button" class="btn btn-primary" href="/student/create/" style="margin-bottom: 15px; margin-top:15px"
            id="button">Add Data</a>
        @if (session('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif
        @php
            $no = 1;
        @endphp
        <table class="table table-dark table-hover">
            <thead>
                <tr>
                    <th scope="col">NIS</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->nis }}</td>
                        <td>{{ $student->nama }}</td>
                        <td>{{ $student->kelas->kelas }}</td>
                        <td>{{ $student->alamat }}</td>
                        <td>{{ $student->gender->gender }}</td>
                        <td>
                            <a type="button" id="button" class="btn btn-primary"
                                href="/student/detail/{{ $student->id }}">Detail</a>
                            <a type="button" id="button" class="btn btn-warning"
                                href="/student/edit/{{ $student->id }}" style="color: white"">Edit</a>
                            <form action="/student/delete/{{ $student->id }}" method="POST" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" id="button"
                                    onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-center fs-4">No student found.</p>
    @endif

    <div class="d-flex justify-content-end">
        {{ $students->links() }}
    </div>


    <script>
        /*!
         * Color mode toggler for Bootstrap's docs (https://getbootstrap.com/)
         * Copyright 2011-2023 The Bootstrap Authors
         * Licensed under the Creative Commons Attribution 3.0 Unported License.
         */

        (() => {
            'use strict'

            const getStoredTheme = () => localStorage.getItem('theme')
            const setStoredTheme = theme => localStorage.setItem('theme', theme)

            const getPreferredTheme = () => {
                const storedTheme = getStoredTheme()
                if (storedTheme) {
                    return storedTheme
                }

                return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light'
            }

            const setTheme = theme => {
                if (theme === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches) {
                    document.documentElement.setAttribute('data-bs-theme', 'dark')
                } else {
                    document.documentElement.setAttribute('data-bs-theme', theme)
                }
            }

            setTheme(getPreferredTheme())

            const showActiveTheme = (theme, focus = false) => {
                const themeSwitcher = document.querySelector('#bd-theme')

                if (!themeSwitcher) {
                    return
                }

                const themeSwitcherText = document.querySelector('#bd-theme-text')
                const activeThemeIcon = document.querySelector('.theme-icon-active use')
                const btnToActive = document.querySelector(`[data-bs-theme-value="${theme}"]`)
                const svgOfActiveBtn = btnToActive.querySelector('svg use').getAttribute('href')

                document.querySelectorAll('[data-bs-theme-value]').forEach(element => {
                    element.classList.remove('active')
                    element.setAttribute('aria-pressed', 'false')
                })

                btnToActive.classList.add('active')
                btnToActive.setAttribute('aria-pressed', 'true')
                activeThemeIcon.setAttribute('href', svgOfActiveBtn)
                const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`
                themeSwitcher.setAttribute('aria-label', themeSwitcherLabel)

                if (focus) {
                    themeSwitcher.focus()
                }
            }

            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', () => {
                const storedTheme = getStoredTheme()
                if (storedTheme !== 'light' && storedTheme !== 'dark') {
                    setTheme(getPreferredTheme())
                }
            })

            window.addEventListener('DOMContentLoaded', () => {
                showActiveTheme(getPreferredTheme())

                document.querySelectorAll('[data-bs-theme-value]')
                    .forEach(toggle => {
                        toggle.addEventListener('click', () => {
                            const theme = toggle.getAttribute('data-bs-theme-value')
                            setStoredTheme(theme)
                            setTheme(theme)
                            showActiveTheme(theme, true)
                        })
                    })
            })
        })()
    </script>
@endsection

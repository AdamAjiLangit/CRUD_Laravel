@extends('layouts.main')

<style>
    #button:hover {
        background-color: transparent;
    }

    .form-group {
        margin-top: 20px;
    }
</style>

@section('container')
    <h1>Edit Student</h1>
    <form action="/student/update/{{ $student->id }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nis">NIS:</label>
            <input type="number" name="nis" id="nis" class="form-control" readonly
                value="{{ old('nis', $student->nis) }}" required>
        </div>
        <div class="form-group">
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" class="form-control"
                value="{{ old('nama', $student->nama) }}" required>
        </div>
        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control"
                value="{{ old('tanggal_lahir', $student->tanggal_lahir) }}" required>
        </div>
        <div class="form-group">
            <label for="kelas">Kelas:</label>
            <select class="form-select" name="kelas_id">
                @foreach ($kelas as $Kelas)
                    <option name="kelas_id" value="{{ $Kelas->id }}"
                        {{ $Kelas->id == $student->kelas_id ? 'selected' : '' }}>
                        {{ $Kelas->kelas }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" class="form-control"
                value="{{ old('alamat', $student->alamat) }}" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender:</label>
            <select class="form-select" name="gender_id">
                @foreach ($gender as $Gender)
                    <option name="gender_id" value="{{ $Gender->id }}"
                        {{ $Gender->id == $student->gender_id ? 'selected' : '' }}>
                        {{ $Gender->gender }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" id="button" class="btn btn-warning" style="margin-top: 20px; color:white;"
            onclick="return confirm('Are you sure you want to edit this student?')">Edit</button>
        <a class="btn btn-danger" id="button" href="/student/all" style="margin-top: 20px; margin-left:5px; color:white">Back</a>

    </form>
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

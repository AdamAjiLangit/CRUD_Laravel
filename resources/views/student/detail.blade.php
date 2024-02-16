@extends('layouts.main')

@section('container')
    <h2>Detail Students {{ $student->nama }}</h2>
    <table class="table table-dark table-hover">
        <thead>
            <tr>
                <th scope="col">NIS</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Kelas</th>
                <th scope="col">Alamat</th>
                <th scope="col">Gender</th>
                <th scope="col">Gambar</th>
            </tr>
        </thead>
        <tr>
            <td>{{ $student->nis }}</td>
            <td>{{ $student->nama }}</td>
            <td>{{ $student->tanggal_lahir }}</td>
            <td>{{ $student->kelas->kelas }}</td>
            <td>{{ $student->alamat }}</td>
            <td>{{ $student->gender->gender }}</td>
            <td>
                <div class="loading-text" id="loadingText">Image is loading...</div>
                <img src="{{ $student->gambar }}" alt="Student Image" id="studentImage" style="display: none;">
            </td>
            <td></td>

        </tr>
    </table>
    <a class="btn btn-danger" id="button" href="/student/all" style="margin-top: 20px; color:white">Back</a>
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const loadingText = document.getElementById('loadingText');
            const studentImage = document.getElementById('studentImage');

            studentImage.addEventListener('load', function() {
                // Sembunyikan teks dan tampilkan gambar saat gambar selesai dimuat
                loadingText.style.display = 'none';
                studentImage.style.display = 'block';
            });

            studentImage.addEventListener('loading', function() {
                // Tampilkan teks saat gambar dimuat
                loadingText.style.display = 'block';
            });

            studentImage.addEventListener('error', function() {
                // Sembunyikan teks jika gambar gagal dimuat
                loadingText.style.display = 'none';
            });
        });
    </script>
@endsection

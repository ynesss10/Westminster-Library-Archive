# Westminster Library Archive

## 📌 Tentang Westminster

**Westminster Library Archive** adalah aplikasi perpustakaan berbasis web yang dirancang untuk memudahkan pengguna dalam mencari, membaca, dan meminjam buku secara digital maupun fisik.

Westminster menyediakan dua jenis akses, yaitu **User** dan **Admin**. User dapat menjelajahi koleksi buku, mencari buku, membaca buku secara digital, melakukan peminjaman, melihat status peminjaman, dan mengembalikan buku.

Sementara itu, Admin memiliki akses untuk mengelola koleksi buku, data pengguna, serta proses peminjaman melalui sistem administrasi.

Westminster juga membagi koleksi menjadi **Books** dan **Archive**. Buku pada bagian Books dapat langsung dipinjam apabila stok tersedia, sedangkan buku pada Archive menggunakan sistem request yang perlu diproses oleh Admin.

## 🎯 Tujuan

Westminster dikembangkan dengan beberapa tujuan utama:

- 📚 **Mempermudah akses buku** — membantu pengguna menemukan dan mengakses koleksi perpustakaan dengan lebih mudah.

- 💻 **Digitalisasi perpustakaan** — menyediakan sistem perpustakaan berbasis web yang menggabungkan koleksi fisik dan digital.

- 🔎 **Mempermudah pencarian** — membantu pengguna menemukan buku yang dibutuhkan melalui katalog dan fitur pencarian.

- 📖 **Mendukung membaca digital** — memberikan akses untuk membaca buku dalam bentuk digital tanpa harus melakukan peminjaman fisik.

- 📋 **Pengelolaan lebih teratur** — membantu Admin mengelola buku, pengguna, stok, dan aktivitas peminjaman secara terpusat.

## 👥 Target Pengguna

### 👤 User

User merupakan pengguna yang mengakses koleksi perpustakaan untuk membaca maupun meminjam buku.

User dapat:

- Melihat koleksi buku.
- Mencari buku.
- Melihat detail buku.
- Membaca buku secara digital.
- Meminjam buku fisik.
- Mengirim request peminjaman buku Archive.
- Melihat status peminjaman.
- Mengembalikan buku.
- Melihat riwayat peminjaman.
- Melihat profil akun.

### 🛡️ Admin

Admin bertugas mengelola dan memantau aktivitas perpustakaan.

Admin dapat:

- Mengelola koleksi buku.
- Menambahkan buku.
- Mengedit data buku.
- Menghapus buku.
- Mengatur stok buku.
- Mengelola file buku digital.
- Mengelola data pengguna.
- Melihat data peminjaman.
- Melihat detail peminjaman.
- Menyetujui request peminjaman.
- Memproses pengembalian buku.

## ✨ Fitur Utama

### 📚 Katalog Buku

Menampilkan koleksi buku yang tersedia pada sistem beserta informasi seperti judul, penulis, kategori, cover, dan ketersediaan stok.

Pengguna dapat memilih buku untuk melihat informasi lebih lengkap melalui halaman detail.

### 🔎 Pencarian Buku

Pengguna dapat mencari buku melalui fitur pencarian untuk menemukan koleksi yang dibutuhkan dengan lebih cepat.

### 📖 Digital Reading

Buku yang tersedia dalam format digital dapat dibaca melalui aplikasi.

Fitur ini memberikan alternatif bagi pengguna yang ingin membaca tanpa melakukan peminjaman buku fisik.

### 📕 Peminjaman Buku

Westminster menyediakan sistem peminjaman buku fisik dengan dua alur berbeda.

**Books**

Buku pada bagian Books dapat langsung dipinjam selama stok tersedia.

```text
Pilih Buku
    ↓
Pinjam Buku
    ↓
Borrowed
    ↓
Return
```

**Archive**

Buku pada bagian Archive menggunakan sistem request sebelum dapat dipinjam.

```text
Pilih Buku
    ↓
Request Pinjam
    ↓
Pending
    ↓
Admin Approve
    ↓
Approved
    ↓
Borrowed
    ↓
Return
```

### 📋 My Borrowings

User dapat melihat daftar buku yang sedang atau pernah dipinjam.

Informasi yang tersedia meliputi:

- Buku yang dipinjam
- Status peminjaman
- Tanggal peminjaman
- Batas pengembalian
- Tanggal pengembalian

User juga dapat melakukan pengembalian buku melalui halaman ini.

### 🛠️ Book Management

Admin dapat mengelola koleksi buku, mulai dari menambahkan, mengedit, hingga menghapus buku.

Admin juga dapat mengatur stok fisik, cover, file digital, serta menentukan apakah sebuah buku termasuk koleksi **Books** atau **Archive**.

### 👥 User Management

Admin dapat melihat dan mengelola data pengguna yang terdaftar pada sistem.

### 📝 Borrowing Management

Admin dapat memantau seluruh aktivitas peminjaman dan memproses request yang masuk.

Admin dapat melihat detail peminjaman serta melakukan proses persetujuan dan pengembalian buku.

## 🔄 Alur Peminjaman

### Peminjaman Books

```text
Pilih Buku
     ↓
Cek Ketersediaan
     ↓
Pinjam Buku
     ↓
Status Borrowed
     ↓
Buku Dikembalikan
     ↓
Status Returned
```

### Peminjaman Archive

```text
Pilih Buku
     ↓
Request Peminjaman
     ↓
Status Pending
     ↓
Admin Memeriksa
     ↓
Request Disetujui
     ↓
Status Approved
     ↓
Buku Dipinjam
     ↓
Buku Dikembalikan
     ↓
Status Returned
```

## 🎨 Konsep UI/UX

Westminster menggunakan konsep antarmuka yang **simple, clean, dan mudah digunakan** agar pengguna dapat berinteraksi dengan sistem tanpa merasa rumit.

Beberapa konsep yang diterapkan:

- 🧭 **Simple Navigation** — navigasi dibuat sederhana agar pengguna dapat berpindah halaman dengan mudah.
- 📚 **Clear Book Information** — informasi buku disusun dengan jelas agar mudah dipahami.
- 🎯 **Consistent Interface** — penggunaan komponen dan layout dibuat konsisten pada setiap halaman.
- 👥 **Role-Based Interface** — tampilan dan fitur disesuaikan berdasarkan kebutuhan User dan Admin.
- 📱 **Responsive Design** — tampilan dirancang agar tetap nyaman digunakan pada berbagai ukuran layar.

## 🛠️ Teknologi yang Digunakan

| Teknologi | Fungsi |
|---|---|
| **Laravel** | Framework utama untuk pengembangan aplikasi web |
| **PHP** | Bahasa pemrograman backend |
| **Laravel Fortify** | Authentication dan pengelolaan akun |
| **Blade** | Template engine untuk tampilan |
| **MySQL** | Penyimpanan dan pengelolaan database |
| **HTML** | Struktur halaman |
| **CSS** | Styling dan layout |
| **JavaScript** | Interaksi pada halaman web |
| **Vite** | Pengelolaan dan build asset frontend |
| **GitHub** | Repository dan kolaborasi project |

## 🗄️ Data yang Dikelola

Westminster menggunakan database untuk menyimpan berbagai data yang dibutuhkan dalam sistem perpustakaan, seperti:

- 👤 Data pengguna
- 🔐 Role pengguna
- 📚 Data buku
- 🏷️ Kategori buku
- 📦 Stok buku
- 🖼️ Cover buku
- 📖 File buku digital
- 📝 Data peminjaman
- 🔄 Status peminjaman
- 📅 Tanggal peminjaman
- 📅 Batas pengembalian
- ✅ Tanggal pengembalian

## 🔑 Hak Akses

| Fitur | User | Admin |
|---|:---:|:---:|
| Register | ✓ | - |
| Login | ✓ | ✓ |
| Melihat Koleksi Buku | ✓ | ✓ |
| Mencari Buku | ✓ | - |
| Melihat Detail Buku | ✓ | ✓ |
| Membaca Buku Digital | ✓ | - |
| Meminjam Buku | ✓ | - |
| Request Buku Archive | ✓ | - |
| Melihat Peminjaman | ✓ | ✓ |
| Mengembalikan Buku | - | ✓ |
| Melihat Profile | ✓ | - |
| Mengelola Buku | - | ✓ |
| Mengelola User | - | ✓ |
| Mengelola Peminjaman | - | ✓ |
| Approve Request | - | ✓ |

## 🗓️ Timeline Pengembangan

| Minggu | Kegiatan |
|---|---|
| **1-2** | Perencanaan konsep dan kebutuhan aplikasi |
| **2-3** | Perancangan UI/UX dan struktur halaman |
| **4-5** | Backend & Database menggunakan Laravel & MySQL |
| **6-7** | Frontend & Integrasi menggunakan Tailwind CSS |
| **8** | Testing, dan penyempurnaan aplikasi |

## 🚀 Konsep Pengembangan

Westminster dikembangkan dengan fokus pada tiga hal utama:

**Accessible** — membuat koleksi perpustakaan lebih mudah diakses oleh pengguna.

**Organized** — membuat pengelolaan buku dan proses peminjaman menjadi lebih terstruktur.

**Digital** — menggabungkan koleksi fisik dengan pengalaman membaca buku secara digital dalam satu aplikasi.

## 📖 Status Proyek

> 🚧 **In Development**
>
> Westminster Library Archive merupakan project pengembangan aplikasi perpustakaan berbasis web yang dibuat untuk menerapkan konsep pengembangan aplikasi menggunakan Laravel, database relasional, authentication, authorization, CRUD, dan sistem peminjaman buku.

---

### 📚 Westminster Library Archive

**Access. Read. Borrow.**

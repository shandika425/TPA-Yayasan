<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Kegiatan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f7;
            margin: 0;
            padding: 0;
        }

        /* Container styling */
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.1);
        }

        /* Title styling */
        h2 {
            color: #343a40;
            font-size: 1.8rem;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            margin-bottom: 20px;
        }

        /* Label styling */
        label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
        }

        /* Form control styling */
        .form-control {
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            padding: 10px;
            font-size: 1rem;
        }

        /* Button styling */
        button {
            padding: 12px;
            border: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            font-size: 1rem;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <a href="<?= site_url('admin/kegiatan') ?>" class="btn btn-warning">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
    <h2>Edit Kegiatan</h2>
    <form action="<?= base_url('admin/keg_edit/' . $kegiatan->id_kegiatan) ?>" method="post">
        <label for="id_guru">ID Guru:</label>
        <input type="number" id="id_guru" name="id_guru" class="form-control" value="<?= $kegiatan->id_guru ?>" required>

        <label for="nama_kegiatan">Nama Kegiatan:</label>
        <input type="text" id="nama_kegiatan" name="nama_kegiatan" class="form-control" value="<?= $kegiatan->nama_kegiatan ?>" required>

        <label for="tempat">Tempat:</label>
        <input type="text" id="tempat" name="tempat" class="form-control" value="<?= $kegiatan->tempat ?>" required>

        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?= $kegiatan->tanggal ?>" required>

        <label for="waktu">Waktu:</label>
        <input type="time" id="waktu" name="waktu" class="form-control" value="<?= $kegiatan->waktu ?>" required>

        <label for="keterangan">Keterangan:</label>
        <textarea id="keterangan" name="keterangan" class="form-control" rows="4"><?= $kegiatan->keterangan ?></textarea>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Update</button>
              <input type="reset" class="btn btn-secondary" value="Batal">
        </div>
    </form>
</div>

</body>
</html>

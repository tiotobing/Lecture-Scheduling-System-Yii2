<?php
namespace app\controllers;

use Yii;
use app\models\Jadwal;
use app\models\JadwalSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class ImportController extends \yii\web\Controller
{
    public function actionIndex()
    {
        //return $this->render('index');
		$objPHPExcel = \PHPExcel_IOFactory::load('../web/file/roster1.xlsx');
		$dataArr = array();
		foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
			$worksheetTitle = $worksheet->getTitle();
			$highestRow = $worksheet->getHighestRow(); // e.g. 10
			$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
			$highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);

			for ($row = 6; $row <= $highestRow; ++$row) {
				$jam = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
				if($jam){
					$jam_split 		= explode(" - ", $jam);
					$jam_mulai 		= explode(".", $jam_split[0])[0] .":". explode(".", $jam_split[0])[1];
					$jam_berakhir 	= explode(".", $jam_split[1])[0] .":". explode(".", $jam_split[1])[1];
				}

				$data[] = [
					'id_mk' => $worksheet->getCellByColumnAndRow(2, $row)->getValue(),
					'id_kelas' => 1,
					'id_ruangan' => 1,
					'jam_selesai' => $jam_berakhir,
					'jam_mulai' => $jam_mulai,
					'hari' => 'Senin',
					'sesi' => $worksheet->getCellByColumnAndRow(0, $row)->getValue(),
					'week' => '14',
					'tanggal' => null,
					'jenis' => $worksheet->getCellByColumnAndRow(4, $row)->getValue(),
				];

				$data[] = [
					'id_mk' => $worksheet->getCellByColumnAndRow(2, $row)->getValue(),
					'id_kelas' => 1,
					'id_ruangan' => 1,
					'jam_selesai' => $jam_berakhir,
					'jam_mulai' => $jam_mulai,
					'hari' => 'Selasa',
					'sesi' => $worksheet->getCellByColumnAndRow(0, $row)->getValue(),
					'week' => '14',
					'tanggal' => null,
					'jenis' => $worksheet->getCellByColumnAndRow(14, $row)->getValue(),
				];

				$data[] = [
					'id_mk' => $worksheet->getCellByColumnAndRow(2, $row)->getValue(),
					'id_kelas' => 1,
					'id_ruangan' => 1,
					'jam_selesai' => $jam_berakhir,
					'jam_mulai' => $jam_mulai,
					'hari' => 'rabu',
					'sesi' => $worksheet->getCellByColumnAndRow(0, $row)->getValue(),
					'week' => '14',					'tanggal' => null,
					'jenis' => $worksheet->getCellByColumnAndRow(24, $row)->getValue(),
				];

				$data[] = [
					'id_mk' => $worksheet->getCellByColumnAndRow(2, $row)->getValue(),
					'id_kelas' => 1,
					'id_ruangan' => 1,
					'jam_selesai' => $jam_berakhir,
					'jam_mulai' => $jam_mulai,
					'hari' => 'kamis',
					'sesi' => $worksheet->getCellByColumnAndRow(0, $row)->getValue(),
					'week' => '14',
					'tanggal' => null,
					'jenis' => $worksheet->getCellByColumnAndRow(44, $row)->getValue(),
				];


				$data[] = [
					'id_mk' => $worksheet->getCellByColumnAndRow(2, $row)->getValue(),
					'id_kelas' => 1,
					'id_ruangan' => 1,
					'jam_selesai' => $jam_berakhir,
					'jam_mulai' => $jam_mulai,
					'hari' => 'jumat',
					'sesi' => $worksheet->getCellByColumnAndRow(0, $row)->getValue(),
					'week' => '14',
					'tanggal' => null,
					'jenis' => $worksheet->getCellByColumnAndRow(54, $row)->getValue(),
				];


			}
		}

		if(yii::$app->user->can('cant_created')){
            $model = new Jadwal();

			Yii::$app->db->createCommand()
			->batchInsert('t_jadwal', ['id_mk','id_kelas','id_ruangan','jam_selesai','jam_mulai','hari','sesi','week','tanggal','jenis'],$data)
			->execute();

			return $this->render('index');
		}else
			{
			throw new ForbiddenHttpException;
		}
    }



}

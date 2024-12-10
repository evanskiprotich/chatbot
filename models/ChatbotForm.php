<?php
namespace app\models;

use yii\base\Model;

class ChatbotForm extends Model
{
    public $prompt;

    public function rules()
    {
        return [
            [['prompt'], 'required'],
        ];
    }
}

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use app\models\ChatbotForm;

class SiteController extends Controller
{
    public function actionChatbot()
    {
        $model = new ChatbotForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $response = $this->runPythonScript($model->prompt);
            return $this->render('chatbot', ['model' => $model, 'response' => $response]);
        }

        return $this->render('chatbot', ['model' => $model]);
    }

    private function runPythonScript($prompt)
    {
        $command = escapeshellcmd("python3 ../commands/llama_chatbot.py " . escapeshellarg($prompt));
        $output = shell_exec($command);
        return $output;
    }
}
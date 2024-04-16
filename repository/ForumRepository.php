<?php

namespace app\repository;

use app\entity\Messages;
use app\entity\Sections;
use app\entity\Subsections;
use app\entity\Topics;

class ForumRepository
{
    public static function getSections(): array
    {
        return Sections::find()->all();
    }

    public static function getSubsections($section_id): array
    {
        return Subsections::find()->where(['section_id' => $section_id])->all();
    }

    public static function createSection($title, $desc)
    {
        $section = new Sections();
        $section->title = $title;
        $section->description = $desc;
        $section->save();
        return $section->id;
    }

    public static function createSubsection($title, $desc, $section_id)
    {
        $subsection = new Subsections();
        $subsection->title = $title;
        $subsection->description = $desc;
        $subsection->section_id = $section_id;
        $subsection->save();
        return $subsection->id;
    }

    public static function getTopics($id)
    {
        return Topics::find()->where(['subsection_id' => $id])->all();
    }

    public static function createTopic($title, $desc, $subsection_id, $user_id)
    {
        $topic = new Topics();
        $topic->title = $title;
        $topic->description = $desc;
        $topic->subsection_id = $subsection_id;
        $topic->user_id = $user_id;
        $topic->save();
        return $topic->id;
    }

    public static function getSectionsTitle($id)
    {
        return Sections::find()->where(['id' => $id])->one()->title;
    }

    public static function getSubsectionsTitle($id)
    {
        return Subsections::find()->where(['id' => $id])->one()->title;
    }

    public static function getTopicsTitle($id)
    {
        return Topics::find()->where(['id' => $id])->one()->title;
    }

    public static function getTopicsAuthor($id)
    {
        return Topics::find()->where(['id' => $id])->one()->user_id;
    }

    public static function getMessages($id)
    {
        return Messages::find()->where(['topic_id' => $id])->all();
    }

    public static function createMessage($text, $topic_id, $user_id)
    {
        $message = new Messages();
        $message->text = $text;
        $message->topic_id = $topic_id;
        $message->user_id = $user_id;
        $message->save();
        return $message->id;
    }
}
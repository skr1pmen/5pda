<?php

namespace app\repository;

use app\entity\Sections;
use app\entity\Subsections;

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
}
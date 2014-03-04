<?php
class CommentTest extends CDbTestCase
{
    public $fixtures = array(
        'comments' => 'Comment',
        'projects' => 'Project',
        'issues' => 'Issue',
    );

    public function testRecentComments()
    {
        $recentComments = Comment::findRecentComments();
        $this->assertTrue(is_array($recentComments));
        $this->assertEquals(count($recentComments), 3);

        $recentComments = Comment::findRecentComments(2);
        $this->assertTrue(is_array($recentComments));
        $this->assertEquals(count($recentComments), 2);

        $recentComments = Comment::findRecentComments(5, 3);
        $this->assertTrue(is_array($recentComments));
        $this->assertEquals(count($recentComments), 1);
    }
}
